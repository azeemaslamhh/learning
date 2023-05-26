@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show Blog</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Blogs Table</a></li>
                        <li class="breadcrumb-item active">Show Blog</li>
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
                            <a class="btn btn-success" href="{{ route('blog_posts.index') }}"> Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-12">





                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="col-12">

                                                <!-- <img src="../../dist/img/prod-1.jpg" class="product-image" alt="Product Image"> -->
                                                <img src="{{ asset( $blogPost?->image) }}" class="product-image" alt="Product Image">

                                            </div>
                                            <div class="col-12 product-image-thumbs">
                                                <div class="product-image-thumb active"><img src="{{ asset( $blogPost?->image) }}" alt="Product Image"></div>

                                                <!-- <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div> -->
                                                @foreach ($blogPost?->images as $img)
                                                <div class="product-image-thumb"><img src="{{ asset( $img?->image) }}" alt="Product Image"></div>

                                                @endforeach

                                                <!-- <div class="product-image-thumb"><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
                                                <div class="product-image-thumb"><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
                                                <div class="product-image-thumb"><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
                                                <div class="product-image-thumb"><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div> -->
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-6">
                                            <h3 class="my-3">{{$blogPost?->title }}</h3>
                                            <p class="mt-3"> {!! $blogPost?->content !!}</p>

                                            <hr>

                                            <div class="mt-4 product-share">
                                                <a href="#" class="text-gray">
                                                    <i class="fab fa-facebook-square fa-2x"></i>
                                                </a>
                                                <a href="#" class="text-gray">
                                                    <i class="fab fa-twitter-square fa-2x"></i>
                                                </a>
                                                <a href="#" class="text-gray">
                                                    <i class="fas fa-envelope-square fa-2x"></i>
                                                </a>
                                                <a href="#" class="text-gray">
                                                    <i class="fas fa-rss-square fa-2x"></i>
                                                </a>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title">
                                                        <i class="fas fas fa-tag"></i>
                                                        Tags
                                                    </h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="callout callout-info text-bold">
                                                        @foreach ($blogPost?->tags as $index => $category)
                                                        @if($index>=1)
                                                        ,
                                                        @endif
                                                        {{ $category?->name }}
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title">
                                                        <i class="fas fa-bullhorn "></i>
                                                        Catgeories
                                                    </h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="callout callout-info text-bold">
                                                        @foreach ($blogPost?->categories as $index => $category)
                                                        @if($index>=1)
                                                        ,
                                                        @endif
                                                        {{ $category?->name }}
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card card-default">

                                                <div class="card-body">
                                                <div class="ctext-bold text-right">
                                                        <a class="btn btn-primary" style="color:white; margin-right: 20;" href="{{ route('blog_posts.edit',$blogPost?->id) }}">Edit</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card card-default">

                                                <div class="card-body">
                                                    <div class=" text-bold text-left">
                                                        <form action="{{ route('blog_posts.destroy',$blogPost?->id) }}" method="POST">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img');
            $('.product-image').prop('src', $image_element.attr('src'));
            $('.product-image-thumb.active').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>

@endsection