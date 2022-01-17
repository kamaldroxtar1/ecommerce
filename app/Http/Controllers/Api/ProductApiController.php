<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\apiresource;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class ProductApiController extends Controller
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
        $data=Products::latest()->get();
        //$data=["msg"=>"Task Api call"];
        return response()->json(['products'=>$data]); 
    }
     public function show($id)
     {$Products=Products::find($id);

        return response()->json(['Products'=>$Products]);
    }
}