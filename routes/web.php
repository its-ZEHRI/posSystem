<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TempProductController;

Auth::routes();
Route::get('/', fn() =>  view('home') );

Route::group(['middleware'=>['auth']],function(){
    Route::get('/dashboard',            [DashboardController::class,   'index'  ]);
    Route::get('/purchase',             [PurchaseController::class,    'index'  ]);
    Route::get('/supplier',             [SupplierController::class,    'index'  ]);
    Route::get('/customer',             [CustomerController::class,    'index'  ]);
    Route::get('/refreshPurchase',      [TempProductController::class, 'refresh']);
    Route::get('/refreshSupplier',      [SupplierController::class,    'refresh']);
    Route::get('/refreshCustomer',      [CustomerController::class,    'refresh']);
    Route::get('/inventory',            [InventoryController::class,   'index'  ]);
    Route::get('/view-report/{id}',     [ReportsController::class,     'viewReport'  ]);

    Route::group(['prefix'=>'/purchase'],function(){
        Route::post('/tempCreateData',  [TempProductController::class, 'tempCreate' ]);
        Route::post('/tempUpdateData',  [TempProductController::class, 'tempUpdate' ]);
        Route::get ('/destroy/{id}',    [TempProductController::class, 'destroy'    ]);
        Route::post('/productStore',    [PurchaseController::class,    'store'      ])->name('productStore');
    });

    Route::group(['prefix' => '/supplier'],function(){
        Route::post('/createSupplier',  [SupplierController::class,        'create' ]);
    });

    Route::group(['prefix' => '/customer'],function(){
        Route::post('/createCustomer',  [CustomerController::class,         'store' ]);

    });

    Route::group(['prefix'=> '/setting'],function(){
        Route::get('/',                 [CategoryController::class,          'index']);
        Route::post('/createCategory',  [CategoryController::class, 'createCategory']);
    });

    Route::group(['prefix'=> '/reports'],function(){
        Route::get('/',                 [ReportsController::class,          'index']);
        Route::post('/createCategory',  [CategoryController::class, 'createCategory']);

    });


    Route::group(['prefix'=> '/sale'],function(){
        Route::get('/',                 [SaleController::class,             'index' ]);
        Route::get('/loadSaleTable',    [SaleController::class,     'loadSaleTable' ]);
        Route::post('/productSale',     [SaleController::class,         'saleProduct' ])->name('productSale');
    });


});// END OF AUTH MIDDLEWARE




Route::get('accounts', function(){
    return view('app.accounts');
});


