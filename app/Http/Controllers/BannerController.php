<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function Show(){
        $BannerModel= new Banner();
        $BannerData=$BannerModel::all();
        return view('admin.adminBanner',['BannerData'=>$BannerData]);
    }

    public function AddBanner(){
        return view('admin.adminAddBannerPage');
    }

    public function Save(Request $request){
        $description=$request->description;
        if ($request->hasfile('image')) {
            $images = $request->file('image');
            foreach($images as $i) {
                $name = rand().$i->getClientOriginalName();
                $i->move(public_path('banner/'), $name);
                   $bannerModal=new Banner();
                   $bannerModal->banner_name=$name;
                   $bannerModal->description=$description;
                   $bannerModal->save();
            }
            return redirect('/adminBanner')->with('success','Uploaded Successfully');
        }
        return back()->with('error','Uploading error');
        }

        public function Destroy($id){
            $BannerModel=new Banner();
            $BannerData=$BannerModel::find($id);
            $file_name=$BannerData->banner_name;
            
            if(file_exists(public_path('banner/'.$file_name))){
                unlink(public_path('banner/'.$file_name));
                }
            $BannerData->delete();

            return back()->with('success','Banner deleted successfully');
        }
}
