<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributes extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'price',
        'product_id',
    ];
    public function Product(){
        return $this->belongsTo(Products::class,'product_id');
    }
}
