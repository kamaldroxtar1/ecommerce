<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\apiresource;
use App\Models\ProductCategories;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function __construct() {
        auth()->setDefaultDriver('api'); 
       }
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=ProductCategories::latest()->get();
        return response()->json(['Product_category'=>$data]); 
    }
     public function show($id)
     {$Product_category=ProductCategories::find($id);

        return response()->json(['Product_category'=>$Product_category]);
    }
}