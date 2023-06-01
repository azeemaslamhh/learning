@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Blogs Table</a></li>
                            <li class="breadcrumb-item active">Update Blog</li>
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
                                <h3 class="card-title">Edit Blog Information</h3>
                            </div>

                            <form action="{{ route('blog_posts.update',$blogPost?->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                                        <div class="col-md-6">
                                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $blogPost?->title }}" required autocomplete="title" autofocus>

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
                                            <textarea id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ $blogPost?->content }}" required autocomplete="content" autofocus>{{ $blogPost?->content }}</textarea>

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
                                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ $blogPost?->image }}" autofocus>
                                            @if($blogPost?->image)
                                            <img src="{{ asset( $blogPost?->image) }}" alt="image" class="img-thumbnail">
                                            @endif
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
                                            <input type="file" name="images[]" id="images" class="form-control @error('images') is-invalid @enderror" value="{{ $blogPost?->images }}" autofocus multiple>
                                            @if($blogPost?->images)
                                            @foreach ($blogPost?->images as $img)
                                            <div class="col-sm-2">
                                                <a href="{{ asset( $img?->image) }}" data-toggle="photos" data-title="{{ asset( $img?->image) }}" data-gallery="gallery">
                                                    <img src="{{ asset( $img?->image) }}" class="img-fluid mb-2" alt="white sample" />
                                                </a>
                                            </div>
                                            @endforeach
                                            @endif
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
                                                <input type="checkbox" id="{{ $blog_post_category->id }}" name="blog_post_categories[]" value="{{ $blog_post_category->id }}" @if(is_array(old('blog_post_categories')) && in_array($blog_post_category->id, old('blog_post_categories'))) checked @endif
                                                @if($blogPost->categories->contains($blog_post_category->id)) checked @endif>
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
                                                <input type="checkbox" id="{{ $blog_post_tag->id }}" name="blog_post_tags[]" value="{{ $blog_post_tag->id }}" @if(is_array(old('blog_post_tags')) && in_array($blog_post_tag->id, old('blog_post_tags'))) checked @endif
                                                @if($blogPost->tags->contains($blog_post_tag->id)) checked @endif>
                                                <label for="blog_post_tag{{ $blog_post_tag->id }}">{{ $blog_post_tag->name }}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a class="btn btn-primary" href="{{ route('blog_posts.index') }}"> Back</a>

                                        </div>
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