@extends('layouts.app')

@section('content')
<style>
    .custom-menu {
        display: none;
        position: absolute;
        background: #fff;
        border: 1px solid #ccc;
        padding: 8px;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show Course Video</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Course Videos Table</a></li>
                        <li class="breadcrumb-item active">Show Course Video</li>
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
                            <a class="btn btn-success" href="{{ route('course_videos.index') }}"> Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-12">

                                    <div class="row">

                                        <div class="col-12 col-sm-6">
                                            <div class="col-12 video-container">
                                                <div class="video-holder">
                                                    <video width="320" height="240" controls controlsList="nodownload">
                                                        <!-- <source src="{{ route('videos.show', ['filename' => '1685950680video1.mp4']) }}" type="video/mp4"> -->
                                                        <source src="{{ route('videos.show', ['filename' => $courseVideo?->video_name ]) }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                    <div class="custom-menu">
                                                        <ul>
                                                            <li id="playButton" class="menu-item" data-action="play" style="cursor:pointer">Play</li>
                                                            <li class="menu-item" data-action="pause" style="cursor:pointer">Pause</li>
                                                            <li class="menu-item" data-action="mute" style="cursor:pointer">Mute</li>
                                                            <li class="menu-item" data-action="unmute" style="cursor:pointer">Unmute</li>
                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>




                                        <div class="col-12 col-sm-6">
                                            <h3 class="my-3">{{$courseVideo?->video_thumbnail }}</h3>
                                            <p class="mt-3"> {$courseVideo?->video_description }</p>

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
                                        <div class="col-md-12">
                                            <div class="card card-default">
                                                <div class="card-header">
                                                    <h3 class="card-title">
                                                        <i class="fas fas fa-tag"></i>
                                                        Course Name
                                                    </h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="callout callout-info text-bold">
                                                        @if($courseVideo->course)
                                                        {{$courseVideo?->course?->title}}
                                                        @else
                                                        No Course Assign
                                                        @endif
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
                                                        <a class="btn btn-primary" style="color:white; margin-right: 20;" href="{{ route('course_videos.edit',$courseVideo?->id) }}">Edit</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card card-default">

                                                <div class="card-body">
                                                    <div class=" text-bold text-left">
                                                        <form action="{{ route('course_videos.destroy',$courseVideo?->id) }}" method="POST">
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
@endsection

<style>
    .video-holder {
        position: relative;
    }

    .video-holder video {
        width: 100% !important;
        height: auto !important;
    }

    .custom-menu {
        display: none;
        position: absolute;
        left: 50% !important;
        top: 50% !important;
        transform: translate(-50%, -50%);
        background: #fff;
        border: 1px solid #ccc;
        padding: 8px;
    }
</style>
