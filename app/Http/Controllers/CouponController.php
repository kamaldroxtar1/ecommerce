<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupons;

class CouponController extends Controller
{
    public function ShowCoupon(){
        $CoupanModel=new Coupons();
        $CouponData=$CoupanModel::all();
        return view('admin.adminCoupon',['CouponData'=>$CouponData]);
    }
    public function ShowAddCouponPage(){
        
        return view('admin.adminAddCouponPage');
    }

    public function Store(Request $request){
        $validated=$request->validate(
            ['coupon'=>'required',
                'discount'=>'required',
                'status'=>'required'
        ],[
            'coupon.required'=>'coupon code is required',
            'discount.required'=>'discount percentage is required',
            'status.required'=>'status required'
        ]);
        if($validated){
            $coupon=$request->coupon;
            $discount=$request->discount;
            $status=$request->status;


            $CouponData= new Coupons();
            $CouponData->coupon=$coupon;
            $CouponData->discount=$discount;
            $CouponData->status=$status;

        }
        if ($CouponData->save()) {
            return redirect("/adminCoupon")->with('success','added successfully');
        } else {
            return back()->with('error', 'coupon not added');
        }
    }
    public function Destroy($id){
        $CoupanModel=new Coupons();
        $CouponData=$CoupanModel::find($id);
        $CouponData->delete();
        return back()->with('success','data deleted successfully');
    }
    public function Edit($id){
        $CoupanModel=new Coupons();
        $CouponData=$CoupanModel::find($id);
        return view('admin.adminCouponEdit',['CouponData'=>$CouponData]);
    }
    public function Update(Request $request, $id){
        $validated=$request->validate(
            ['coupon'=>'required',
                'discount'=>'required',
                'status'=>'required'
        ],[
            'coupon.required'=>'coupon code is required',
            'discount.required'=>'discount percentage is required',
            'status.required'=>'status required'
        ]);
        if($validated){
            $coupon=$request->coupon;
            $discount=$request->discount;
            $status=$request->status;


            $CouponData=Coupons::find($id);
            $CouponData->coupon=$coupon;
            $CouponData->discount=$discount;
            $CouponData->status=$status;

        }
        if ($CouponData->save()) {
            return redirect("/adminCoupon")->with('success','updated successfully');
        } else {
            return back()->with('error', 'coupon not updated');
        }
    }
}
