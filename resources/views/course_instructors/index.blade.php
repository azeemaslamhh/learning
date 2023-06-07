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
                    <h1>Course Instructor</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Course Instructor</li>
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
                            <a class="btn btn-success float-right" href="{{ route('course_instructors.create') }}"> Create Course Instructor</a>
                        </div>

                        <!-- Default box -->
                        <div class="card card-solid">
                            <div class="card-body pb-0">
                                <div class="row">

                                    @foreach ($course_instructors as $course_instructor)

                                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                        <div class="card bg-light d-flex flex-fill">
                                            <div class="card-header text-muted border-bottom-0">
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-7 text-bold">


                                                        <a class="brand-link text-black">
                                                            <img src="{{ asset('storage/admins/images/' . $course_instructor->image) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

                                                            <span class="brand-text font-weight-dark">{{ $course_instructor?->name }}</span>
                                                        </a>
                                                        <!-- {{ $course_instructor?->name }} -->

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-right">
                                                    <form action="{{ route('course_instructors.destroy',$course_instructor?->id) }}" method="POST">
                                                        <a class="btn btn-info" href="{{ route('course_instructors.show',$course_instructor?->id) }}">Show</a>
                                                        <a class="btn btn-primary" href="{{ route('course_instructors.edit',$course_instructor?->id) }}">Edit</a>
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


        </div>
    </section>
</div>
@endsection