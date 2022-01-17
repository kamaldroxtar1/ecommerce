<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;
class ConfigurationController extends Controller
{
    public function Show(){
        $ConfigModel= new Configuration();
        $ConfigData=$ConfigModel::find(1);
        return view('admin.adminConfiguration',['ConfigData'=>$ConfigData]);
    }

    public function Update(Request $request,$id){
        $ConfigData= Configuration::find($id); 

        $ConfigData->admin_email=$request->admin_email;
        $ConfigData->notification_email=$request->notification_email;
        if($ConfigData->save()){
            return back()->with('success','updated successfully');
        }
        return back()->with('error','not updated');
    }
}
