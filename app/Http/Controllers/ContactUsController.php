<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contactus;

class ContactUsController extends Controller
{
    public function showContactUs(){
        $ContactUsModel=new contactus();
        $ContactUsData= $ContactUsModel::all();
        return view('admin.adminContactUs',['ContactUsData'=>$ContactUsData]);

    }
    public function Destroy($id){
        $ContactUsModel=new contactus();
        $ContactUsData= $ContactUsModel::find($id);
        $ContactUsData->delete();
        return back()->with('success','data deleted successfully');

    }
}
