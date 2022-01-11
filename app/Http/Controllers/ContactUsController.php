<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactus;

class ContactUsController extends Controller
{
    public function ShowContactUs(){
        $ContactUsModel=new Contactus();
        $ContactUsData= $ContactUsModel::all();
        return view('admin.adminContactUs',['ContactUsData'=>$ContactUsData]);

    }
    public function Destroy($id){
        $ContactUsModel=new Contactus();
        $ContactUsData= $ContactUsModel::find($id);
        $ContactUsData->delete();
        return back()->with('success','data deleted successfully');

    }
}
