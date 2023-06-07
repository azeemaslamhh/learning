@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Course Video</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Course Videos Table</a></li>
                            <li class="breadcrumb-item active">Update Course Video</li>
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
                                <h3 class="card-title">Edit Course Video Information</h3>
                            </div>

                            <form action="{{ route('course_videos.update',$courseVideo?->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                
                                <div class="row mb-3">
                                    <label for="video_name" class="col-md-4 col-form-label text-md-end">{{ __('Video Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="video_name" type="file" class="form-control @error('video_name') is-invalid @enderror" name="video_name" value="{{ $courseVideo?->video_name }}" required autocomplete="video_name" autofocus>

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
                                        <textarea id="video_thumbnail" type="text" class="form-control @error('video_thumbnail') is-invalid @enderror" name="video_thumbnail" value="{{ $courseVideo?->video_thumbnail }}" required autocomplete="video_thumbnail" autofocus>{{ $courseVideo?->video_thumbnail }}</textarea>

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
                                        <input id="video_description" type="text" class="form-control @error('video_description') is-invalid @enderror" name="video_description" value="{{ $courseVideo?->video_description }}" required autocomplete="video_description" autofocus>

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
                                        <select class="form-control" id="user_id" name="user_id" required>
                                            <option value="" disabled selected>--Select Course--</option>
                                            @foreach ($courses as $course)
                                            <option value="{{$course->id}}" {{$courseVideo?->course?->id == $course?->id  ? 'selected' : ''}}>{{$course?->title}}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-primary" href="{{ route('course_videos.index') }}"> Back</a>

                                    </div>
                                </div>
                            </form>




                        </div>
                    </div>
                </div>
        </section>
    </div>
</div>
<!-- Include CKEditor scripts -->
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<!-- Initialize CKEditor on the textarea -->
<script>
    CKEDITOR.replace('content');
</script>

@endsection