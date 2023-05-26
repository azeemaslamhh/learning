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
                    <h1>Blogs</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blogs</li>
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
                            <a class="btn btn-success float-right" href="{{ route('courses.create') }}"> Create New Blog</a>
                        </div>

                        <!-- Default box -->
                        <div class="card card-solid">
                            <div class="card-body pb-0">
                                <div class="row">

                                    @foreach ($courses as $blog_post)

                                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                        <div class="card bg-light d-flex flex-fill">
                                            <div class="card-header text-muted border-bottom-0">
                                            </div>
                                            <div class="card-body pt-0">
                                                <img src="{{ $blog_post?->image }}" class="img-thumbnail" alt="{{ $blog_post?->title }}" style="height: 300px">
                                                <div class="card-body">
                                                    <h5 class="card-title text-bold">{{ $blog_post?->title }}</h5>
                                                    <br />
                                                    <div class="card-footer">
                                                        <div class="text-right">

                                                            <form action="{{ route('courses.destroy',$blog_post?->id) }}" method="POST">
                                                                <a class="btn btn-info" href="{{ route('courses.show',$blog_post?->id) }}">Show</a>
                                                                <a class="btn btn-primary" href="{{ route('courses.edit',$blog_post?->id) }}">Edit</a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                                            </form>

                                                        </div>
                                                    </div>

                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>











                <!-- <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <a class="btn btn-success float-right" href="{{ route('courses.create') }}"> Create New Blog</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $blog_post)
                                    <tr>
                                        <td>
                                            {{ $blog_post?->id }}
                                        </td>
                                        <td>
                                            {{ $blog_post?->title }}
                                        </td>
                                        <td>
                                            {{ $blog_post?->content }}
                                        </td>
                                        <td>
                                            <form action="{{ route('courses.destroy',$blog_post?->id) }}" method="POST">
                                                <a class="btn btn-info" href="{{ route('courses.show',$blog_post?->id) }}">Show</a>
                                                <a class="btn btn-primary" href="{{ route('courses.edit',$blog_post?->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
            </div> -->
            </div>
    </section>
</div>
@endsection