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
                            <a class="btn btn-success float-right" href="{{ route('blog_posts.create') }}"> Create New Blog</a>
                        </div>

                        <!-- Default box -->
                        <div class="card card-solid">
                            <div class="card-body pb-0">
                                <div class="row">

                                    @foreach ($blog_posts as $blog_post)
    
                                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                        <div class="card bg-light d-flex flex-fill">
                                            <div class="card-header text-muted border-bottom-0">
                                            </div>
                                            <div class="card-body pt-0">
                                            <img src="storage/admins/images/{{  $blog_post?->image }}" alt="Image" class="img-thumbnail" style="height: 300px; width:100% cover:fit-content; ">
                                                <div class="card-body">
                                                    <h5 class="card-title text-bold">{{ $blog_post?->title }}</h5>
                                                    <br />
                                                    <div class="card-footer">
                                                        <div class="text-right">

                                                            <form action="{{ route('blog_posts.destroy',$blog_post?->id) }}" method="POST">
                                                                <a class="btn btn-info" href="{{ route('blog_posts.show',$blog_post?->id) }}">Show</a>
                                                                <a class="btn btn-primary" href="{{ route('blog_posts.edit',$blog_post?->id) }}">Edit</a>
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
            </div>
    </section>
</div>
@endsection