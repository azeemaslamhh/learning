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
                    <h1>Blog Tags</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blog Tags</li>
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
                            <a class="btn btn-success float-right" href="{{ route('blog_post_tags.create') }}"> Create Blog Tag</a>
                        </div>

                        <!-- Default box -->
                        <div class="card card-solid">
                            <div class="card-body pb-0">
                                <div class="row">

                                    @foreach ($blog_post_tags as $blog_post_tag)

                                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                        <div class="card bg-light d-flex flex-fill">
                                            <div class="card-header text-muted border-bottom-0">
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-7 text-bold">
                                                        {{ $blog_post_tag?->name }}

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-right">
                                                    <form action="{{ route('blog_post_tags.destroy',$blog_post_tag?->id) }}" method="POST">
                                                        <a class="btn btn-info" href="{{ route('blog_post_tags.show',$blog_post_tag?->id) }}">Show</a>
                                                        <a class="btn btn-primary" href="{{ route('blog_post_tags.edit',$blog_post_tag?->id) }}">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                                    </form>
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
            </div>













            <!-- <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <a class="btn btn-success float-right" href="{{ route('blog_post_tags.create') }}"> Create Blog Tag</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($blog_post_tags as $blog_post_tag)
                                    <tr>
                                        <td>
                                            {{ $blog_post_tag?->id }}
                                        </td>
                                        <td>
                                            {{ $blog_post_tag?->name }}
                                        </td>


                                        <td>
                                            <form action="{{ route('blog_post_tags.destroy',$blog_post_tag?->id) }}" method="POST">
                                                <a class="btn btn-info" href="{{ route('blog_post_tags.show',$blog_post_tag?->id) }}">Show</a>
                                                <a class="btn btn-primary" href="{{ route('blog_post_tags.edit',$blog_post_tag?->id) }}">Edit</a>
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