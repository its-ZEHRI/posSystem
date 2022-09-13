<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'p_code',
        'p_price',
        'ws_price',
        's_price',
        'category_id',
        'quantity',
        'supplier_id',
        'purchase_id',
        'user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class , 'category_id','id');
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function soldProducts(){
        return $this->hasMany(soldProduct::class);
    }

}
