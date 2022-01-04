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

    <form class="form-group col-5 container" method="post" action="/superadminAddUser">
        @csrf
        <div class="form-group mb-2">
            <label for="name"> First Name</label>
            <input type="text" class="form-control" id="name" name="name">
            @if($errors->has('name'))
            <div class="alert alert-danger" >
                <strong>{{ $errors->first('name') }}</strong>
            </div>
            @endif
        </div>
        <div class="form-group mb-2">
            <label for="name"> Last Name</label>
            <input type="text" class="form-control" id="l_name" name="l_name">
            @if($errors->has('l_name'))
            <div class="alert alert-danger" >
                <strong>{{ $errors->first('l_name') }}</strong>
            </div>
            @endif
        </div>
        <div class="form-group mb-2">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email">
            @if($errors->has('email'))
            <div class="alert alert-danger" >
                <strong>{{ $errors->first('email') }}</strong>
            </div>
            @endif
        </div>
        <div class="form-group mb-2">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label for="cpassword">Confirm Password</label>
            <input type="password" class="form-control" name="cpassword" id="cpassword">
        </div>
        <div class="form-group mb-2">
            <label for="role_id">Role Name</label>

            <select name="role_id" class="form-control" id="role_id">
                <option>--Select Role Type--</option>
                @foreach($values as $i)
                <option value="{{$i->id}}">{{$i->name}}</option>
                @endforeach
            </select>
            @error('role_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <br>
        <button type="submit" class="btn btn-primary mb-2">Add User</button>
    </form>
</div>

@endsection()