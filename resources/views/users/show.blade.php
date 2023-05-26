@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Users Table</a></li>
                        <li class="breadcrumb-item active">Show User</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-success" href="{{ route('users.index') }}"> Back</a>
                        </div>
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
                                    <tr>
                                        <td>{{ $user?->id }}</td>
                                        <td>{{ $user?->name }}</td>
                                        <td>{{ $user?->email }}</td>
                                        <td>{{ $user?->roles?->first()?->name }}</td>

                                        <td>
                                            <form action="{{ route('users.destroy',$user?->id) }}" method="POST">
                                                <a class="btn btn-primary" href="{{ route('users.edit',$user?->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
</div>









@endsection