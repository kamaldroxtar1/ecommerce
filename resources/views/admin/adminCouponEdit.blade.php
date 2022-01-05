@extends('admin.masterLayout')
@section('topbar')
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>


        </li>

      </ul>
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        @if (Route::has('login'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @endif

        @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </li>
        @endguest
      </ul>

      <!-- Right navbar links -->

    </nav>
@endsection()
@section('sidebar')
      <!-- Brand Logo -->
      <a href="home" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Platform</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
          <div class="info">
            <a href="#" class="d-block">{{Auth::user()->email}}</a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
         
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
@endsection()
@section('content')
<div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Admin Dashboard</h1>
            </div><!-- /.col -->
            
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        @if(Session::has('success'))
        <div class="alert alert-success">
        {{Session::get('success')}}
        </div>
        @endif
      </div>
      <!-- /.content-header -->
    <div class="container col-4">
        <h1 class="text-center">Coupon Management</h1>
        <form class="mt-5" action="/admin/coupon/update/{{$CouponData->id}}" method="post">
          @csrf()
          <div class="form-group">
            <label for="">Coupon</label>
            <input type="text" class="form-control" name="coupon" value="{{$CouponData->coupon}}">
          </div>
          <div class="form-group">
            <label for="">Discount</label>
            <input type="text" class="form-control" name="discount" value="{{$CouponData->discount}}">
          </div>
          <div class="form-group">
            <label for="">Status</label>
            <select name="status" id="" class="form-control">
              @if($CouponData->status==1){
              <option value="1" selected >Active</option>
              <option value="0" >Inactive</option>
              }
              @elseif($CouponData->status==0){
              <option value="1"  >Active</option>
              <option value="0" selected >Inactive</option>
              }
              @endif
            </select>
          </div>
          <input type="submit" class="btn btn-success form-control" value="Update">
        </form>
    </div>
@endsection()