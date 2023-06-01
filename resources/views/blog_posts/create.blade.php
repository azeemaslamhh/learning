@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Blogs Table</a></li>
                            <li class="breadcrumb-item active">Create Blog</li>
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
                                <h3 class="card-title">Add Blog Information</h3>
                            </div>
                            <form method="POST" action="{{ route('blog_posts.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                                        <div class="col-md-6">
                                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="content" class="col-md-4 col-form-label text-md-end">{{ __('Content') }}</label>

                                        <div class="col-md-6">
                                            <textarea id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" required autocomplete="content" autofocus></textarea>

                                            @error('content')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Feature Image') }}</label>

                                        <div class="col-md-6">
                                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autofocus>

                                            @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label for="images[]" class="col-md-4 col-form-label text-md-end">{{ __('Images') }}</label>

                                        <div class="col-md-6">
                                            <input type="file" name="images[]" id="images" class="form-control @error('images') is-invalid @enderror" value="{{ old('images') }}" autofocus multiple>

                                            @error('images')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="row mb-3">
                                        <label class="col-md-4 col-form-label text-md-end">{{ __('Select Categories') }}</label>
                                        <div class="col-md-6">
                                            @foreach ($blog_post_categories as $blog_post_category)
                                            <div>
                                                <input type="checkbox" id="{{ $blog_post_category->id }}" name="blog_post_categories[]" value="{{ $blog_post_category->id }}" @if(is_array(old('categories')) && in_array($blog_post_tag->id, old('categories'))) checked @endif >
                                                <label for="blog_post_category{{ $blog_post_category->id }}">{{ $blog_post_category->name }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-4 col-form-label text-md-end">{{ __('Select Tags') }}</label>
                                        <div class="col-md-6">
                                            @foreach ($blog_post_tags as $blog_post_tag)
                                            <div>
                                                <input type="checkbox" id="{{ $blog_post_tag->id }}" name="blog_post_tags[]" value="{{ $blog_post_tag->id }}" @if(is_array(old('tags')) && in_array($blog_post_tag->id, old('tags'))) checked @endif>
                                                <label for="blog_post_tag{{ $blog_post_tag->id }}">{{ $blog_post_tag->name }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a class="btn btn-primary" href="{{ route('post_types.index') }}"> Back</a>

                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
        </section>
    </div>

</div><!-- Include CKEditor scripts -->
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<!-- Initialize CKEditor on the textarea -->
<script>
    CKEDITOR.replace('content');
</script>

@endsection