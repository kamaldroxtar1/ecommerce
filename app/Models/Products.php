<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    public function ProductCategory(){
        return $this->belongsTo(ProductCategories::class,'product_category_id');
    }
}
