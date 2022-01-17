<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetails;
use App\Models\OrderedProducts;
class OrderController extends Controller
{
    public function Show(){
        $OrderDetails=OrderDetails::all();
        return view('admin.adminOrderDetails',['OrderDetails'=>$OrderDetails]);
    }

    public function Destroy($id){
        $OrderData=OrderDetails::find($id);
        $OrderProducts=OrderDetails::find($id)->OrderedProducts;
        foreach($OrderProducts as $item){
            $item->delete();
        }
        $OrderData->delete();
        return back()->with('success','deleted successfully.');
    }

    public function Edit($id){
        $OrderData=OrderDetails::find($id);
        return view('admin.adminOrderDetailsEdit',['OrderData'=>$OrderData]);
    }

    public function Update(Request $request,$id){
        $orderStatus=$request->order_status;
        $OrderData=OrderDetails::find($id);
        $OrderData->order_status=$orderStatus;
        $OrderData->save();
        return redirect('/adminOrder')->with('success','updated successfuly');
    }
}
