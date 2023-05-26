@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Quiz</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Quizzes Table</a></li>
                            <li class="breadcrumb-item active">Update Quiz</li>
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
                                <h3 class="card-question">Edit Quiz Information</h3>
                            </div>

                            <form action="{{ route('quiz_questions.update',$quizQuestion?->id) }}" method="POST">
                                @csrf
                                @method('PUT')




                                <div class="row mb-3">
                                    <label for="post_type_id" class="col-md-4 col-form-label text-md-end">{{ __('Select Type') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="post_type_id" name="post_type_id" required>
                                            <option value="" disabled selected>--Select Type--</option>

                                            @foreach ($quizzes as $quiz)
                                            <option value="{{$quiz?->id}}" {{$quizQuestion?->quiz_id == $quiz?->id  ? 'selected' : ''}}>{{$quiz?->title}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="question" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-6">
                                        <input id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ $quizQuestion?->question }}" required autocomplete="question" autofocus>
                                        @error('question')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>


                            
                                <div class="row mb-3">
                                    <label for="total_score" class="col-md-4 col-form-label text-md-end">{{ __('Marks') }}</label>
                                    <div class="col-md-6">
                                        <input id="total_score" type="total_score" class="form-control @error('total_score') is-invalid @enderror" name="total_score" value="{{ $quizQuestion?->total_score }}" autocomplete="total_score" autofocus>
                                        @error('total_score')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-primary" href="{{ route('quizzes.index') }}"> Back</a>

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