<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderedProducts;
use App\Models\OrderDetails;
class OrderedProductsController extends Controller
{
    public function Show($id){
        $OrderProducts=OrderDetails::find($id)->OrderedProducts;
        return view('admin.adminOrderProducts',['OrderProducts'=>$OrderProducts]);
    }
}
