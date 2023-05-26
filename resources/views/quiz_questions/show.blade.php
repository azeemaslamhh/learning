@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show Quiz Question</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Quiz Questions Table</a></li>
                        <li class="breadcrumb-item active">Show Quiz Question</li>
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
                            <div class="card-header">
                                <h1>{{$quiz?->title}}</h1>
                                <a class="btn btn-primary float-left" href="{{route('quizzes.show', [$quiz?->id])}}"> Back to Question</a>
                                <a class="btn btn-success float-right" href="/quizzes/{{$quiz?->id}}/quiz_questions/create"> Add Question</a>

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
                                        <th>ID</th>
                                        <th>Question</th>
                                        <th>Total Score</th>
                                        <th>Quiz Title</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quiz?->quiz_questions as $question)
                                    <tr>
                                        <td>{{ $question?->id }}</td>
                                        <td>{{ $question?->question }}</td>
                                        <td>{{ $question?->total_score }}</td>
                                        <td>{{ $question?->quiz->title }}</td>
                                        <td>{{ $question?->created_at }}</td>
                                        <td>{{ $question?->updated_at }}</td>


                                        <td>

                                        <td class="project-actions text-right">
                                            <form action="{{ route('quizzes.quiz_questions.destroy',$question?->id) }}" method="POST">

                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"> <i class="fas fa-trash">
                                                    </i>Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
</div>









@endsection