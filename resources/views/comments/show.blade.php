@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Comments</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Comments</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">



            <form action="/problem_lists/search" method="GET" role="search">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" name="search" value="{{ old('search') }}" class="form-control form-control-lg" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>



            <!-- Default box -->

            <div class="card">
                <div class="card-header">
                    <div class="card-header">
                        <h1>{{$problem_list?->problem}}</h1>
                        <a class="btn btn-primary float-left" href="/comments"> All Questions Comments </a>
                        <a class="btn btn-primary float-left" href="{{route('problem_lists.show', [$problem_list?->id])}}"> Back to Question</a>

                        <a class="btn btn-success float-right" href="/problem_list/{{$problem_list?->id}}/comment/create"> Add Comment</a>
                    </div>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 1%">
                                    #
                                </th>
                                <th style="width: 20%">
                                    Comments
                                </th>
                                <th style="width: 30%">
                                    Commenter Name
                                </th>
                                <th style="width: 20%">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($problem_list?->comments as $com)
                            <tr>
                                <td>
                                    {{$com?->id}}
                                </td>
                                <td>
                                    <a>
                                        {{$com?->comment}}
                                    </a>
                                    <br />
                                    <small>
                                        {{$com?->created_at}}
                                    </small>
                                </td>
                                <td>
                                    {{$com?->user?->name}}
                                </td>

                                <td class="project-actions text-right">
                                    <form action="{{ route('problem_list.comments.destroy',$com?->id) }}" method="POST">

                                        <a class="btn btn-info btn-sm" href="{{ route('problem_lists.comments.edit', ['problem_list' => $problem_list->id, 'comment' => $com?->id]) }}"> <i class="fas fa-pencil-alt">
                                            </i>Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"> <i class="fas fa-trash">
                                            </i>Delete</button>
                                    </form>
                                    <!-- <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a> -->


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
</div>

@endsection