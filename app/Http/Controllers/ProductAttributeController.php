<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductAttributes;
use App\Models\Products;
class ProductAttributeController extends Controller
{
    public function Show(){
        $data=ProductAttributes::all();
        return view('admin.adminProductAttribute',compact('data'));
    }

    public function AddPAge(){
        $ProductsData=Products::all();
        return view('admin.adminAddProductAttribute',['ProductsData'=>$ProductsData]);
    }
    
    public function Store(Request $req){ 
            $validated=$req->validate([ 
            'product_id'=>'required',
             'quantity'=>'required',
              'price'=>'required', ]);
             if($validated)
            {
                ProductAttributes::insert([
                    'product_id'=>$req->product_id,
                    'quantity'=>$req->quantity,
                    'price'=>$req->price,
                        
                     ]);
                      return redirect('/adminProductAttribute')->with('success','Attribute inserted successfully');
            }
             else{
                return back()->with('error','Attribute Not inserted'); 
            } 
        }
                
    public function Destroy($id){
            ProductAttributes::find($id)->delete(); 
            return back()->with('success','Deleted successfully');
        }

    public function Edit($id){
        $ProductsData=Products::all();
        $data=ProductAttributes::find($id);
        return view('admin.adminEditProductAttribute',['ProductsData'=>$ProductsData,'data'=>$data]);
    }

    public function Update(Request $req,$id){
        $validated=$req->validate([ 
            'product_id'=>'required',
             'quantity'=>'required',
              'price'=>'required', ]);
             if($validated)
            {
                $model=ProductAttributes::find($id);
                $model->Update([
                    'product_id'=>$req->product_id,
                    'quantity'=>$req->quantity,
                    'price'=>$req->price,
                        
                     ]);
                      return redirect('/adminProductAttribute')->with('success','Attribute Updated successfully');
            }
             else{
                return back()->with('error','Attribute Not Updated'); 
            } 
    }
}
