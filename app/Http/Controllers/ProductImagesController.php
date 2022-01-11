<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductsImages;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class ProductImagesController extends Controller
{
    public function ShowImages($id){
        $imageList = Products::find($id)->ProductImages;
        return view('admin.adminProductImages',['imageList'=>$imageList,'id'=>$id]);
    }

    public function AddImages($id){
        return view('admin.adminProductAddImages',['id'=>$id]);
    }

    public function Save(Request $request,$id){
        if ($request->hasfile('image')) {
            $images = $request->file('image');
            foreach($images as $i) {
                $name = rand().$i->getClientOriginalName();
                $i->move(public_path('images/'), $name);
                   $imageModal=new ProductsImages();
                   $imageModal->image_name=$name;
                   $imageModal->product_id=$id;
                   $imageModal->save();
            }
            return redirect('/admin/product/images/'.$id)->with('success','Uploaded Successfully');
        }
        return back()->with('error','Uploading error');
        }
    
        public function Destroy($id){
            $ProductsImagesModel=new ProductsImages();
            $ProductImage=$ProductsImagesModel::find($id);
            $file_name=$ProductImage->image_name;
            
            if(file_exists(public_path('images/'.$file_name))){
                unlink(public_path('images/'.$file_name));
                }
            $ProductImage->delete();

            return back()->with('success','Image deleted successfully');
        }
}
