<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
class RolesController extends Controller
{
    public function Show(){
        $RolesModel=new Roles();
        $RoleList=$RolesModel->all();
        return view('superAdmin.show',['RoleList'=>$RoleList]);

    }
    public function Destroy($id){
        $RolesModel=new Roles();
        $RoleList=$RolesModel::find($id);
        $RoleList->delete();
        return back();
    }
    
    public function Edit($id){
        $RolesModel=new Roles();
        $RoleList=$RolesModel::find($id);
        return view('superAdmin.edit',['RoleList'=>$RoleList]);
    }
}
