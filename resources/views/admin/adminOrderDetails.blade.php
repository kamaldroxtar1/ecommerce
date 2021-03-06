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
    <div class="container">
        <h1 class="text-center">Order Management</h1>
        <table class="table table-bordered mt-5">
            <thead class="thead-dark">
                <tr>
                    <th>Order Number</th>
                    <th>User </th>
                    <th>Shipping Method </th>
                    <th>Payment Gateway  </th>
                    <th>Total Amount </th>
                    <th>Shipping Address </th>
                    <th>Order Date </th>
                    <th>Coupon Code </th>
                    <th>Order Status </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
    
                @foreach ($OrderDetails as $item)
                <tr>
                    <td><a href="/admin/orderProduct/{{$item->id}}" class="btn btn-secondary">{{$item->id}}</a></td>
                    <td>{{$item->User->name}}</td>
                    <td>{{$item->shipping_method}}</td>
                    <td>{{$item->payment_gateway}}</td>
                    <td>{{$item->total_amount}}</td>
                    <td>{{$item->shipping_address}}</td>
                    <td>{{$item->order_date}}</td>
                    <td>{{$item->Coupons->coupon }}</td>
                    <td>{{$n=($item->order_status==1)?"Active":"Inactive"}}</td>
                    <td>
                        <a href="/admin/order/delete/{{$item->id}}"  onclick="return confirm('Are you sure?')" class="btn btn-danger ">Delete</a>
                        <a href="/admin/order/edit/{{$item->id}}" class="btn btn-warning ">Edit</a>
                    </td>
                    </tr>
                 
                @endforeach
            </tbody>
        </table>
    </div>
@endsection()