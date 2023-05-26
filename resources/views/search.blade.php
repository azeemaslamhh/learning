@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Search</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Search</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <a class="btn btn-success" href="{{ route('home') }}"> Back</a>

                        </div>
                        @if(is_array($users) || is_object($users))
                        <div class="card-header">
                            Users
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>

                                            <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>

                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            @endif

                        </div>
                        @if(is_array($problem_lists) || is_object($problem_lists))

                        <div class="card-header">
                            Problem Lists
                        </div>

                        <div class="card-body">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 520px">Problem</th>
                                        <th>Category </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($problem_lists as $problem_list)
                                    <tr>
                                        <td>{{ $problem_list->problem }}</td>

                                        <td>{{$problem_list->category->name }}</td>

                                        <td>
                                            <a class="btn btn-info" href="{{ route('problem_lists.show',$problem_list->id) }}">Show</a>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif

                        </div>
                        @if (is_array($categories) || is_object($categories))

                        <div class="card-header">
                            Categories
                        </div>
                        <div class="card-body">

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 820px">Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>

                                        <td>
                                            <a class="btn btn-info" href="{{ route('categories.show',$category->id) }}">Show</a>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection