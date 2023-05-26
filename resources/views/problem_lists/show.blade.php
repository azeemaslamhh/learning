@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show Question</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Questions Table</a></li>
                        <li class="breadcrumb-item active">Show Question</li>
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
                            <a class="btn btn-success" href="{{ route('problem_lists.index') }}"> Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                    <span class="info-box-number text-center mb-0">File Name</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 col-sm-6">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                    <span class="info-box-text text-center  mb-0">{{$problem_list?->filename }}</span>
                                                </div>
                                            </div>
                                        </div>
                                      
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12 col-sm-3">
                                                    <div class="info-box bg-light">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text text-center">Likes</span>
                                                            <span class="info-box-number text-center mb-0">{{$problem_list?->likes}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-3">
                                                    <div class="info-box bg-light">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text text-center">Category</span>
                                                            <span class="info-box-number text-center  mb-0">{{$problem_list?->category?->name }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-3">
                                                    <div class="info-box bg-light">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text text-center">Type</span>
                                                            <span class="info-box-number text-center  mb-0">{{$problem_list?->post_type?->name }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-3">
                                                    <div class="info-box bg-light">
                                                        <div class="info-box-content">
                                                            <span class="info-box-text text-center text-muted">Dislikes</span>
                                                            <span class="info-box-number text-center text-muted mb-0">{{ $problem_list?->disLikes }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 text-center">
                                                    <h1 class="">{{$problem_list?->problem }}</h1>
                                                    <pre><code class="language-javascript">{{ $problem_list?->anwser }}</code></pre>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-4">
                                                    <div class="info-box bg-light">
                                                        <div class="info-box-content">
                                                            <span class="info-box-number text-center mb-0"> <a class="btn btn-warning" href="{{route('problem_lists.comments.show', [$problem_list?->id])}}">See Comments</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <div class="info-box bg-light">
                                                        <div class="info-box-content">
                                                            <span class="info-box-number text-center  mb-0"> <a class="btn btn-primary" href="{{ route('problem_lists.edit',$problem_list?->id) }}">Edit</a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-4">
                                                    <div class="info-box bg-light">
                                                        <div class="info-box-content">
                                                            <span class="info-box-number text-center text-muted mb-0">
                                                                <form action="{{ route('problem_lists.destroy',$problem_list?->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </span>
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