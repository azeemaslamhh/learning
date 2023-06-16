@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Course</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Course</a></li>
                            <li class="breadcrumb-item active">Update Course</li>
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
                                <h3 class="card-title">Edit Course</h3>
                            </div>

                            <form action="{{ route('courses.update',$course?->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                    {{$course}}
                                    {{$course->tags}}
                                    {{$course->instructors}}

                                <div class="row mb-3">
                                    <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                                    <div class="col-md-6">
                                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" title="title" value="{{ $course?->title }}" required autocomplete="title" autofocus>

                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Descriptions') }}</label>

                                    <div class="col-md-6">
                                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $course?->description }}" required autocomplete="description" autofocus>

                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('price') }}</label>

                                    <div class="col-md-6">

                                        <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$course?->price }}" required autocomplete="price" autofocus>


                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ $course?->image }}" required autofocus>

                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                

                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">{{ __('Select Categories') }}</label>
                                    <div class="col-md-6">
                                        @foreach ($course_categories as $course_category)
                                        <div>
                                            <input type="checkbox" id="{{ $course_category->id }}" name="course_categories[]" value="{{ $course_category->id }}" @if(is_array(old('course_categories')) && in_array($course_category->id, old('course_categories'))) checked @endif
                                            @if($course->categories->contains($course_category->id)) checked @endif>
                                            <label for="course_category{{ $course_category->id }}">{{ $course_category->name }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">{{ __('Select Tags') }}</label>
                                    <div class="col-md-6">
                                        @foreach ($course_tags as $course_tag)
                                        <div>
                                            <input type="checkbox" id="{{ $course_tag->id }}" name="course_tags[]" value="{{ $course_tag->id }}" @if(is_array(old('course_tags')) && in_array($course_tag->id, old('course_tags'))) checked @endif
                                            @if($course->tags->contains($course_tag->id)) checked @endif>
                                            <label for="course_tag{{ $course_tag->id }}">{{ $course_tag->name }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-4 col-form-label text-md-end">{{ __('Select Instructors') }}</label>
                                    <div class="col-md-6">
                                        @foreach ($course_instructors as $course_inst)
                                        <div>
                                            
                                            <input type="checkbox" id="{{ $course_inst->id }}" name="course_instructors[]" value="{{ $course_inst->id }}" @if(is_array(old('course_instructors')) && in_array($course_inst->id, old('course_instructors'))) checked @endif
                                            @if($course->instructors->contains($course_inst->id)) checked @endif>
                                            <label for="course_inst{{ $course_inst->id }}">{{ $course_inst->name }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>


                               


                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-success" href="{{ route('courses.index') }}"> Back</a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
</div>

@endsection