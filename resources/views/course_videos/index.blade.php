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
                    <h1>Course Videos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Course Videos</li>
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
                        <!-- Default box -->
                        <div class="card card-solid">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">

                                                <a class="btn btn-success float-right" href="{{ route('course_videos.create') }}"> Create New Blog</a>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10px">#</th>
                                                            <!-- Video Name -->
                                                            <th>Video</th>
                                                            <th>Video Thumbnail</th>
                                                            <th>Video Description</th>
                                                            <th>Course name</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($course_videos as $course_video)
                                                        <tr>
                                                            <td>
                                                                {{ $course_video?->id }}
                                                            </td>
                                                            <td>

                                                                <div class="video-container">
                                                                    <div class="video-holder">
                                                                        <video width="320" height="240" controls controlsList="nodownload">
                                                                            <!-- <source src="http://localhost/LMS/storage/admins/videos/1686132912video.mp4" type="video/mp4"> -->
                                                                            <!-- <source src="{{ route('videos.show', ['filename' => '1686132912video.mp4']) }}" type="video/mp4"> -->
                                                                            <source src="{{ route('videos.show', ['filename' => $course_video?->video_name ]) }}" type="video/mp4">

                                                                            
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



                                                            </td>
                                                            <td>
                                                                {{ $course_video?->video_thumbnail }}
                                                            </td>
                                                            <td>
                                                                {{ $course_video?->video_description }}
                                                            </td>
                                                            <td>
                                                                @if($course_video->course)
                                                                {{$course_video?->course?->title}}
                                                                @else
                                                                No Course Assign
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <form action="{{ route('course_videos.destroy',$course_video?->id) }}" method="POST">
                                                                    <a class="btn btn-info" href="{{ route('course_videos.show',$course_video?->id) }}">Show</a>
                                                                    <a class="btn btn-primary" href="{{ route('course_videos.edit',$course_video?->id) }}">Edit</a>
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                                                </form>

                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="card-footer clearfix">
                                                <ul class="pagination pagination-sm m-0 float-right">
                                                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
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