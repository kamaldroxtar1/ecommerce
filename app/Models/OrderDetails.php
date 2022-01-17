<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    public function OrderedProducts(){
        return $this->hasMany(OrderedProducts::class,'order_id','id');
    }

    public function Coupons(){
        return $this->belongsTo(Coupons::class,'coupon_id');
    }

    public function User(){
        return $this->belongsTo(User::class,'user_id');
    }
}
