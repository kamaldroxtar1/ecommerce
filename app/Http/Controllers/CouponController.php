<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\coupons;

class CouponController extends Controller
{
    public function ShowCoupon(){
        $CoupanModel=new coupons();
        $CouponData=$CoupanModel::all();
        return view('admin.adminCoupon',['CouponData'=>$CouponData]);
    }

    public function Destroy($id){
        $CoupanModel=new coupons();
        $CouponData=$CoupanModel::find($id);
        $CouponData->delete();
        return back()->with('success','data deleted successfully');
    }
}
