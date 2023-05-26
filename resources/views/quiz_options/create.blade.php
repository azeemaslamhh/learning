@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Quiz Questions</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Quiz Questions Table</a></li>
                            <li class="breadcrumb-item active">Create Quiz Questions</li>
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
                                <h3 class="card-title">Add Questions Information</h3>
                            </div>

                            <form method="POST" action="{{ route('quiz_questions.store') }}">
                                @csrf

                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="quiz_id" class="col-md-4 col-form-label text-md-end">{{ __('Select Type') }}</label>
                                        <div class="col-md-6">
                                            <select class="form-control" id="quiz_id" name="quiz_id" required>
                                                <option value="" disabled selected>--Select Quiz--</option>
                                                @foreach ($quizzes as $quiz)
                                                <option value="{{$quiz?->id}}">{{$quiz?->title}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
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
                                        <label for="order" class="col-md-4 col-form-label text-md-end">{{ __('Order') }}</label>
                                        <div class="col-md-6">
                                            <input id="order" type="number" class="form-control @error('order') is-invalid @enderror" name="order" value="{{ old('order') }}" autocomplete="order" autofocus>
                                            @error('order')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="number" class="col-md-4 col-form-label text-md-end">{{ __('Marks') }}</label>
                                        <div class="col-md-6">
                                            <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" autocomplete="number" autofocus>
                                            @error('number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a class="btn btn-primary" href="{{ route('problem_lists.index') }}"> Back</a>

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

@endsection