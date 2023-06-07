@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Course Video</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Course Videos Table</a></li>
                            <li class="breadcrumb-item active">Create Course Video</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Course Video Information</h3>
                            </div>
                            <form method="POST" action="{{ route('course_videos.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="video_name" class="col-md-4 col-form-label text-md-end">{{ __('Video Name') }}</label>

                                    <div class="col-md-6">
                                    <input type="file" name="video_name" id="video_name" class="form-control-file @error('video_name') is-invalid @enderror" value="{{ old('video_name') }}" required>

                                        <!-- <input id="video_name" type="text" class="form-control @error('video_name') is-invalid @enderror" name="video_name" value="{{ old('video_name') }}" required autocomplete="video_name" autofocus> -->

                                        @error('video_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="video_thumbnail" class="col-md-4 col-form-label text-md-end">{{ __('Video Thumbnail') }}</label>

                                    <div class="col-md-6">
                                        <input id="video_thumbnail" type="text" class="form-control @error('video_thumbnail') is-invalid @enderror" name="video_thumbnail" value="{{ old('video_thumbnail') }}" required autocomplete="video_thumbnail" autofocus>

                                        @error('video_thumbnail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="video_description" class="col-md-4 col-form-label text-md-end">{{ __('Video Description') }}</label>
                                    <div class="col-md-6">
                                        <textarea id="video_description" type="text" class="form-control @error('video_description') is-invalid @enderror" name="video_description" value="{{ old('video_description') }}" required autocomplete="video_description" autofocus></textarea>
                                        @error('video_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="course_id" class="col-md-4 col-form-label text-md-end">{{ __('Select Course') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="course_id" id="course_id" required>
                                            <option value="">--Select Course--</option>
                                            @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-primary" href="{{ route('post_types.index') }}"> Back</a>

                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
        </section>
    </div>

</div>


@endsection