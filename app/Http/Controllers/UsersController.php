<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

use App\Models\Roles;
class UsersController extends Controller
{
    public function ShowAddPage(){
        $rolesModel=new Roles();
        $values=$rolesModel::all();
        return view('superAdmin.AddUser',['values'=>$values]);
    }

    public function Add(Request $request){
        $validated = $request->validate(
            [
                'name' => 'required',
                'l_name' => 'required',
                'email' => 'required',
                'password' =>'required',
                'role_id' => 'required',
        
            ],
            [
                'name.required' => 'first name is required',
                'l_name.required'  =>  'last name is required',
                'email.required' => 'email is required',
                'password.required' =>'password is not allowed',
                
        
            ]
        );
        if($validated)
        {
            $name = $request->name;
            $l_name = $request->l_name;
            $email = $request->email;
            $password=Hash::make($request->password);
            $role_id = $request->role_id;

            $UserModel=new User();

            $UserModel->name=$name;
            $UserModel->l_name=$l_name;
            $UserModel->email=$email;
            $UserModel->password=$password;
            $UserModel->role_id=$role_id;
        
            
            if ($UserModel->save()) {
                return redirect("superadminShowList")->with('success','Added successfully');
            } else {
                return back()->with('error', 'User not Added');
            }
        }

    }

    public function Show(){
        $UserModel=new User();
        $UserList=$UserModel->paginate(3);
        return view('superAdmin.show',['UserList'=>$UserList]);

    }
    public function Destroy($id){
        $UserModel=new User();
        $UserList=$UserModel::find($id);
        $UserList->delete();
        return back();
    }
    
    public function Edit($id){
        $UserModel=new User();
        $rolesModel=new Roles();
        $values=$rolesModel::all();
        $UserList=$UserModel::find($id);
        return view('superAdmin.edit',['UserList'=>$UserList,'values'=>$values]);
    }

    public function Update(Request $request,$id)
    {
        // return response($request->all()) ;
        if(Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'l_name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id' => ['integer'],
    
        ])){
            $name = $request->name;
            $l_name = $request->l_name;
            $email = $request->email;
            $role_id = $request->role_id;

            $UserModel=User::find($id);

            $UserModel->name=$name;
            $UserModel->l_name=$l_name;
            $UserModel->email=$email;
            $UserModel->role_id=$role_id;
        
            
            if ($UserModel->save()) {
                return redirect("superadminShowList")->with('success','updated successfully');
            } else {
                return back()->with('error', 'User not updated');
            }
        }
        
    }
}
