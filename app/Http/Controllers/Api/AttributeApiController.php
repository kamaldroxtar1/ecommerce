<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\apiresource;
use App\Models\ProductAttributes;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class AttributeApiController extends Controller
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
        $data=ProductAttributes::latest()->get();
        return response()->json(['ProductAttributes'=>$data]); 
    }
     public function show($id)
     {$ProductAttributes=ProductAttributes::find($id);

        return response()->json(['ProductAttributes'=>$ProductAttributes]);
    }
}