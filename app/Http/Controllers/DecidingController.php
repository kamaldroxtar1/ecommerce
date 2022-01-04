<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DecidingController extends Controller
{
    public function check(){
        if(Auth::user()->role_id==1){
            return view('superAdmin.superAdminPage');
        }

        elseif(Auth::user()->role_id==2){
            return view('admin.adminPage');
        }
        
        elseif(Auth::user()->role_id==5){
            return view('customer.customerPage');
        }
    }
}
