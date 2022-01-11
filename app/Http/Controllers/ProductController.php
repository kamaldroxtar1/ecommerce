<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductCategories;

class ProductController extends Controller
{
    public function Show(){
        $ProductModel=new Products();
        $ProductsData=$ProductModel::all();
        return view('admin.adminProduct',['ProductsData'=>$ProductsData]);
    }

    public function ShowAddProductPage(){
        $categoryModel=new ProductCategories();
        $CategoryData=$categoryModel::all();
        return view('admin.adminAddProduct',['CategoryData'=>$CategoryData]);
    }
    public function Store(Request $request){
        $validated = $request->validate([
            'product_category'=>'required',
            'product_name'=>'required'
        ],[
            'product_category.required'=>'category is required',
            'product_name.required'=>'name is required'

        ]);
        if($validated){
            $product_category=$request->product_category;
            $product_name=$request->product_name;

            $productModel=new Products();
            $productModel->product_category_id = $product_category;
            $productModel->product_name = $product_name;
            if($productModel->save()){
                return redirect('/adminProducts')->with('success','added successfully');
            }
            return back()->with('error','details not added');

        }
    }

    public function Edit($id){
        $productModel=new Products();
        $ProductsData=$productModel::find($id);

        $categoryModel=new ProductCategories();
        $CategoryData=$categoryModel::all();

        return view('admin.adminProductEdit',['ProductsData'=>$ProductsData,'CategoryData'=>$CategoryData]);
    }
    
    public function Update(Request $request, $id){
        $validated = $request->validate([
            'product_category'=>'required',
            'product_name'=>'required'
        ],[
            'product_category.required'=>'category is required',
            'product_name.required'=>'name is required'

        ]);
        if($validated){
            $product_category=$request->product_category;
            $product_name=$request->product_name;

            $ProductsData=Products::find($id);
            $ProductsData->product_category_id=$product_category;
            $ProductsData->product_name=$product_name;

        }
        if ($ProductsData->save()) {
            return redirect("/adminProducts")->with('success','updated successfully');
        } else {
            return back()->with('error', 'Details not updated');
        }
    }

    public function Destroy($id){
        $ProductsData=new Products();
        $ProductData=$ProductsData::find($id);
        $ProductData->delete();
        return back()->with('success','data deleted successfully');
    }
}
