<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\TempProduct;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'company_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'Total_amount' => 'integer',
        'Total_invoices' => 'integer'
    ];
    public function temp_products(){
        return $this->hasMany(TempProduct::class,'user_id','id');
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function categories(){
        return $this->hasMany(Category::class);
    }
    public function Suppliers(){
        return $this->hasMany(Supplier::class);
    }
    public function Customers(){
        return $this->hasMany(Customer::class);
    }
    public function purchases(){
        return $this->hasMany(Purchase::class);
    }
    public function sales(){
        return $this->hasMany(Sale::class);
    }
}
