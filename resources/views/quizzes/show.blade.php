@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show Quiz</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Quizzes Table</a></li>
                        <li class="breadcrumb-item active">Show Quiz</li>
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

                            <a class="btn btn-success" href="{{ route('quizzes.index') }}"> Back</a>
                            <a class="btn btn-primary float-right" href="{{ route('quizzes.edit',$quiz?->id) }}"> Update Quiz</a>
                        </div>
                        <div class="card-body">
                            <form action="#" method="POST">
                                <div class="form-group">
                                    <h3>{{ $quiz?->title }}</h3>
                                </div>
                                @foreach ($quiz_questions as $key => $quiz_question)
                                @if ($quiz_question['option_type'] == "text")
                                <div class="form-group">
                                    <label for="question">Question {{$key+1}}</label>
                                    <input type="text" name="quiz[{{$key}}][question]" id="question" class="form-control" value="{{ $quiz_question?->question }}">
                                </div>
                                <div class="form-group">
                                    <label for="total_score">Total Score</label>
                                    <input type="number" name="quiz[{{$key}}][total_score]" id="total_score" class="form-control" value="{{ $quiz_question?->total_score }}">
                                </div>
                                <div class="form-group">
                                    <label for="options">Answer Field</label>
                                    @foreach ($quiz_question?->quiz_options as $option)
                                    <!-- <div class="form-check"> -->
                                    <div class="form">
                                        <textarea class="form-control" name="quiz[{{$key}}][field_value]" id="quiz[{{$key}}][field_value]" cols="30" rows="5" value="{{ $option?->text_field_correct_answer }}"></textarea>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <div class="form-group">
                                    <label for="question">Question {{$key+1}}</label>
                                    <input type="text" name="quiz[{{$key}}][question]" id="question" class="form-control" value="{{ $quiz_question?->question }}">
                                </div>
                                <div class="form-group">
                                    <label for="total_score">Total Score</label>
                                    <input type="number" name="quiz[{{$key}}][total_score]" id="total_score" class="form-control" value="{{ $quiz_question?->total_score }}">
                                </div>
                                <div class="form-group">
                                    <label for="options">Options</label>
                                    @foreach ($quiz_question?->quiz_options as $option)
                                    <div class="form-check">
                                        <input type="{{ $quiz_question?->option_type }}" name="quiz[{{ $key }}][answer][]" id="option_{{ $option?->id }}" class="form-check-input" value="{{ $option?->id }}" @if(is_array(old('quiz.'.$key.'.answer')) && in_array($option->id, old('quiz.'.$key.'.answer'))) checked @endif>
                                        <label for="option_{{ $option?->id }}" class="form-check-label">{{ $option->option_name }}</label>
                                        <!-- <label for="option_{{ $option?->id }}" class="form-check-label bg-success">{{ $option->correct_option==1? "Correct Answer": "" }}</label> -->
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection