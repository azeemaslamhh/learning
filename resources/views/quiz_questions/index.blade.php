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
                    <h1>Quiz Questions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quiz Questions</li>
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

                            <a class="btn btn-success float-right" href="{{ route('quiz_questions.create') }}"> Create New Quiz</a>
                        </div>
                        <div class="card-body">
                            <table id="quiz_questions-index-table" class="table table-bordered">
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
                                    @foreach ($quiz_questions as $quiz)
                                    <tr>
                                        <td>{{ $quiz?->id }}</td>
                                        <td>{{ $quiz?->question }}</td>
                                        <td>{{ $quiz?->total_score }}</td>
                                        <td>{{ $quiz?->quiz->title }}</td>
                                        <td>{{ $quiz?->created_at }}</td>
                                        <td>{{ $quiz?->updated_at }}</td>

                                        <td>
                                            <form action="{{ route('quiz_questions.destroy',$quiz?->id) }}" method="POST">

                                                <a class="btn btn-info" href="{{ route('quiz_questions.show',$quiz?->id) }}">Show</a>

                                                <a class="btn btn-primary" href="{{ route('quiz_questions.edit',$quiz?->id) }}">Edit</a>

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
                        <!-- /.card-body -->

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



@endsection