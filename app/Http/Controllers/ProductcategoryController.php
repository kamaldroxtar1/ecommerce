<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategories;

class ProductcategoryController extends Controller
{
    public function ShowAddCategoryPage(){
        return view('admin.adminAddCategory');
    }

    public function Store(Request $request){
        $validated = $request->validate([
            'category_name'=>'required',
        ],[
            'category_name.required'=>'category is required'

        ]);
        if($validated){
            $category_name=$request->category_name;
            $categoryModel=new ProductCategories();
            $categoryModel->category_name = $category_name;
            if($categoryModel->save()){
                return redirect('/adminCategory')->with('success','added successfully');
            }
            return back()->with('error','details not added');

        }
    }
    public function ShowCategory(){
        $categoryModel=new ProductCategories();
        $CategoryData=$categoryModel::all();
        return view('admin.adminCategory',['CategoryData'=>$CategoryData]);

    }
    public function Destroy($id){
        $categoryModel=new ProductCategories();
        $CategoryData=$categoryModel::find($id);
        $CategoryData->delete();
        return back()->with('success','Record deleted');
    }
}
