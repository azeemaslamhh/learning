@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Course Instructor</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Course Instructor</a></li>
                            <li class="breadcrumb-item active">Update Course Instructor</li>
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
                                <h3 class="card-title">Edit Course Instructor</h3>
                            </div>

                            <form action="{{ route('course_instructors.update',$courseInstructor?->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $courseInstructor?->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="detail" class="col-md-4 col-form-label text-md-end">{{ __('Details') }}</label>

                                    <div class="col-md-6">
                                        <input id="detail" type="text" class="form-control @error('detail') is-invalid @enderror" name="detail" value="{{ $courseInstructor?->detail }}" required autocomplete="detail" autofocus>

                                        @error('detail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <label for="experience" class="col-md-4 col-form-label text-md-end">{{ __('Experience') }}</label>

                                    <div class="col-md-6">

                                        <input id="experience" type="number" class="form-control @error('experience') is-invalid @enderror" name="experience" value="{{$courseInstructor?->experience }}" required autocomplete="experience" autofocus>


                                        @error('experience')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="rating" min="0" max="5" class="col-md-4 col-form-label text-md-end">{{ __('Rating') }}</label>

                                    <div class="col-md-6">
                                        <input id="rating" type="number" class="form-control @error('experience') is-invalid @enderror" name="rating" value="{{$courseInstructor?->rating }}" required autocomplete="rating" autofocus>

                                        @error('rating')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                                    <div class="col-md-6">
                                        <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ $courseInstructor?->image }}" autofocus>
                                        @if($courseInstructor?->image)
                                        <img src="{{ asset( $courseInstructor?->image) }}" alt="image" class="img-thumbnail">
                                        @endif
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-success" href="{{ route('course_instructors.index') }}"> Back</a>

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