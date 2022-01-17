<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\apiresource;
use App\Models\Banner;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class BannerApiController extends Controller
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
        $data=Banner::latest()->get();
        return response()->json(['Banner'=>$data]); 
    }
     public function show($id)
     {$Banners=Banner::find($id);

        return response()->json(['Banners'=>$Banners]);
    }
}