@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">



            <form action="/users/filter" method="GET" role="filter">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">

                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Sort Order:</label>
                                        <select class="form-select form-select-lg" id="sort_order" name="sort_order">
                                            <option selected value="ASC">ASC</option>
                                            <option value="DESC">DESC</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label>Order By:</label>
                                        <select class="form-select form-select-lg" id="order_by" name="order_by">
                                            <option selected value="name">Name</option>
                                            <option value="email">Email</option>
                                            <option value="created_at">Date</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-1" style="margin-top: 32px;">
                                    <button type="submit" class=" btn btn-success btn-lg ">
                                        Filter
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <form action="/users/search" method="GET" role="search">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" name="search" value="{{ old('search') }}" class="form-control form-control-lg" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-success float-right" href="{{ route('users.create') }}"> Create New User</a>

                            <!-- <h3 class="card-title">User Table</h3> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Email </th>
                                        <th>Role </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user?->id }}</td>
                                        <td>{{ $user?->name }}</td>
                                        <td>{{ $user?->email }}</td>
                                        <td>{{ $user?->roles?->first()?->name }}</td>
                                        <td>
                                            <form action="{{ route('users.destroy',$user?->id) }}" method="POST">

                                                <a class="btn btn-info" href="{{ route('users.show',$user?->id) }}">Show</a>

                                                <a class="btn btn-primary" href="{{ route('users.edit',$user?->id) }}">Edit</a>
                                                @if($user?->roles->first()->name!="admin")

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection