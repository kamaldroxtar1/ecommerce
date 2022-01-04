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

    <div class="container text-center">
        <table class="table">
            <thead>
                <tr>
                    <td>
                        Role Id
                    </td>
                    <td>
                        Role Name
                    </td>
                    <td>
                        Email
                    </td>
                    <td>
                        Name
                    </td>
                    <td>
                        Action
                    </td>
                </tr>
            </thead>
            <tbody>
            @foreach($UserList as $item)
            <tr>
                <td>
                    {{$item->RolesTable->id}}
                </td>
                <td>
                    {{$item->RolesTable->name}}
                </td>
                <td>
                    {{$item->email}}
                </td>
                <td>
                    {{$item->name}} {{$item->l_name}}
                </td>
                <td>
                    <a href="superAdmin/RoleDelete/{{$item->id}}" class="btn btn-danger">Delete</a>
                    <a href="superAdmin/RoleEdit/{{$item->id}}" class="btn btn-info">Edit</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$UserList->links('pagination::bootstrap-4')}}
    </div>
@endsection()