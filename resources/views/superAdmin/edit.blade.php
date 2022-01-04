@extends('superAdmin.masterLayout')
@section('content')
<div class="content-wrapper container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Super Admin Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @if(Session::has('success'))
        <div class="alert alert-success">
        {{Session::get('success')}}
        </div>
    @endif

    <form class="form-group col-5 container" method="post" action="/superAdmin/RoleUpdate/{{$UserList->id}}">
        @csrf
        <div class="form-group mb-2">
            <label for="name"> First Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$UserList->name}}">
        </div>
        <div class="form-group mb-2">
            <label for="name"> Last Name</label>
            <input type="text" class="form-control" id="l_name" name="l_name" value="{{$UserList->l_name}}">
        </div>
        <div class="form-group mb-2">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{$UserList->email}}">
        </div>
        <div class="form-group mb-2">
            <label for="role_id">Role Name</label>
            <select name="role_id" class="form-control" id="role_id">
            @foreach($values as $i)
            @if($i->id==$UserList->role_id){
            <option selected value="{{$i->id}}">{{$i->name}}</option>
            }
            @else
            {
                <option value="{{$i->id}}">{{$i->name}}</option>
            }
            @endif
            @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary mb-2">Update Role</button>
    </form>
</div>

@endsection()