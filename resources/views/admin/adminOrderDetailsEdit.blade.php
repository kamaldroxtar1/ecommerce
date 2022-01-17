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
    <div class="container text-center">
        <h1 class="text-center">Order Management</h1>
        <form action="/admin/order/update/{{$OrderData->id}}" method="POST">
          @csrf
        <table class="table table-bordered mt-5 col-5 m-auto">
            <tr>
              <th>Order Number:</th>
              <td>{{$OrderData->id}}</td>
            </tr>
            <tr>
            <th>User:</th>
              <td>{{$OrderData->user_id}}</td>
            </tr>
            <tr>
            <th>Shipping Method:</th>
              <td>{{$OrderData->shipping_method}}</td>
            </tr>
            <tr>
            <th>Payment Gateway:</th>
              <td>{{$OrderData->payment_gateway}}</td>
            </tr>
            <tr>
            <th>Total Amount:</th>
              <td>{{$OrderData->total_amount}}</td>
            </tr>
            <tr>
            <th>Shipping Address:</th>
              <td>{{$OrderData->shipping_address}}</td>
            </tr>
            <tr>
            <th>Order Date:</th>
              <td>{{$OrderData->order_date}}</td>
            </tr>
            <tr>
            <th>Coupon Code:</th>
              <td>{{$OrderData->coupon_id }}</td>
            </tr>
            <tr>
            <th>Order Status:</th>
                <td> Active: <input type="radio" {{$c=($OrderData->order_status ==1)? 'checked':'unchecked'}} name="order_status" value='1'>
                      <br>
                    Inactive: <input type="radio" {{$c=($OrderData->order_status==0)? 'checked':'unchecked'}} name="order_status" value='0'>
                </td>
             
            </tr>
        </table>
        <input type="submit" value="Update" class="btn btn-success m-2">
        </form>
    </div>
@endsection()