<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
<<<<<<< HEAD
=======

    public function soldProduct(){
        return $this->hasMany(SoldProduct::class,'sale_id','id');
    }
>>>>>>> e74706ec3fbc4ec310b6f973539a1b15ce935b0c
    // public function getCreatedAtAttribute($date)
    // {
    //     return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y');
    // }


}
