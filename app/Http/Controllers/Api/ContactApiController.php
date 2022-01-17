<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\apiresource;
use App\Models\Contactus;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;

class ContactApiController extends Controller
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
        $data=Contactus::latest()->get();
        return response()->json(['Contact'=>$data]); 
    }
     public function show($id)
     {$ContactUs=Contactus::find($id);

        return response()->json(['Contact'=>$ContactUs]);
    }

    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>['required'],
            'email'=>['required'],
            'phone'=>['required'],
            'message'=>['required'],
        ]);
        if($validator->fails()){
            return response(['errors'=>$validator->errors()]);
        }
        else{
            $data = new Contactus();
            $data->name=$request->name;
            $data->email=$request->email;
            $data->phone=$request->phone;
            $data->message=$request->message;
        

            if($data->save()){
                return response(['data'=>new apiresource($data),"message"=>"data stored"],201);
               // return response()->json($data);
            }
            else{
               // return response()->json(['msg'=>'api not added']);
               return response(['msg'=>"data not stored"]);
            }
        }

    }
}