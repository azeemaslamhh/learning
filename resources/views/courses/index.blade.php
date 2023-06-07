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
                    <h1>Course</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Course</li>
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
                        <!-- Default box -->
                        <div class="card card-solid">
                            <div class="card-body pb-0">
                                <div class="row">
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
                                                            <th>Description</th>
                                                            <th>Price</th>
                                                            <th>Image</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($courses as $course)
                                                        <tr>

                                                            <td>
                                                                {{ $course?->id }}
                                                            </td>
                                                            <td>
                                                                {{ $course?->title }}
                                                            </td>
                                                            <td>
                                                                {{ $course?->description }}
                                                            </td>
                                                            <td>
                                                                {{ $course?->price }}
                                                            </td>
                                                            <td>
                                                                {{ $course?->image }}
                                                            </td>
                                                            <td>
                                                                <form action="{{ route('courses.destroy',$course?->id) }}" method="POST">
                                                                    <a class="btn btn-info" href="{{ route('courses.show',$course?->id) }}">Show</a>
                                                                    <a class="btn btn-primary" href="{{ route('courses.edit',$course?->id) }}">Edit</a>
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
                                </div>



                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>











                <!--  -->
            </div>
    </section>
</div>
@endsection