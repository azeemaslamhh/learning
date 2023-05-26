@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show Course Category {{ $courseCategory?->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Course Category</a></li>
                        <li class="breadcrumb-item active">Show Course Category {{ $courseCategory?->name }}</li>
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
                            <a class="btn btn-success" href="{{ route('course_categories.index') }}"> Back</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th style="width: 660px">Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>{{ $courseCategory?->id }}</td>
                                        <td>{{ $courseCategory?->name }}</td>
                                        <td>
                                            <form action="{{ route('course_categories.destroy',$courseCategory?->id) }}" method="POST">
                               
                                                <a class="btn btn-primary" href="{{ route('course_categories.edit',$courseCategory?->id) }}">Edit</a>

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