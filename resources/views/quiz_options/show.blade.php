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
                            <a class="btn btn-success" href="{{ route('quiz_questions.index') }}"> Back</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                        <th>Question</th>
                                        <th>Order</th>
                                        <th>Number</th>
                                        <th>Quiz Title</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>{{ $quizQuestion?->id }}</td>
                                        <td>{{ $quizQuestion?->title }}</td>
                                        <td>{{ $quizQuestion?->order }}</td>
                                        <td>{{ $quizQuestion?->number }}</td>
                                        <td>{{ $quizQuestion?->quiz->title }}</td>
                                        <td>{{ $quizQuestion?->created_at }}</td>
                                        <td>{{ $quizQuestion?->updated_at }}</td>
                                        <td>
                                            <form action="{{ route('quiz_questions.destroy',$quizQuestion?->id) }}" method="POST">
                                                <a class="btn btn-primary" href="{{ route('quiz_questions.edit',$quizQuestion?->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <!-- /.card -->
            </div>
        </div>
    </section>
</div>









@endsection