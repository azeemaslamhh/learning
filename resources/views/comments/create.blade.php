@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Comment</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Questions Table</a></li>
                            <li class="breadcrumb-item active">Add Comment</li>
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
                                <h3 class="card-title">Add Comment Information to "{{$problem_list->problem}}"</h3>
                            </div>

                            <form method="POST" action="/problem_list/{{$problem_list->id }}/comment/store">
                                @csrf

                                <div class="row mb-3">
                                    <label for="comment" class="col-md-4 col-form-label text-md-end">{{ __('Comment') }}</label>

                                    <div class="col-md-6">
                                        <input id="comment" type="text" class="form-control @error('comment') is-invalid @enderror" name="comment" value="{{ old('comment') }}" required autocomplete="name" autofocus>

                                        @error('comment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="user_id" class="col-md-4 col-form-label text-md-end">{{ __('Select User') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="user_id" name="user_id" required>
                                            <option value="" disabled selected>--Select User--</option>
                                            @foreach ($users as $user)
                                            <option value="{{$user->id}}">{{$user?->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="problem_list_id" class="col-md-4 col-form-label text-md-end">{{ __('Question') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="problem_list_id" name="problem_list_id" required>
                                            <option value="{{$problem_list->id}}" selected>{{$problem_list?->problem}}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-primary" href="{{route('problem_lists.comments.show', [$problem_list?->id])}}"> Back</a>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</div>

@endsection