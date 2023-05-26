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
                    <h1>Quizzes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quizzes</li>
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
                            @include('layouts.partials._button', ['routeName' => 'quizzes.create', 'color' => 'success float-right', 'text' => ' Create Quiz'])
                            <!-- <a class="btn btn-success float-right" href="{{ route('quizzes.create') }}"> Create New Quiz</a> -->
                        </div>
                        <div class="card-body">
                            <table id="quizzes-index-table" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($quizzes as $quiz)
                                    <tr>
                                        <td>{{ $quiz?->id }}</td>
                                        <td>{{ $quiz?->title }}</td>
                                        <td>{{ $quiz?->created_at }}</td>
                                        <td>{{ $quiz?->updated_at }}</td>
                                        <td>
                                            <form action="{{ route('quizzes.destroy',$quiz?->id) }}" method="POST">

                                                <a class="btn btn-info" href="{{ route('quizzes.show', $quiz->id) }}">Show</a>

                                                <a class="btn btn-primary" href="{{ route('quizzes.edit',$quiz?->id) }}">Edit</a>


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


@section('script')

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> -->
<script>
    $(function() {
        $('#quizzes-index-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{ route('get.quizes') }",

            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'total_numbers',
                    name: 'total_numbers'
                },
                {
                    data: 'is_active',
                    name: 'is_active'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'updated_at',
                    name: 'updated_at'
                }
            ]
        });
    });
</script>




@endsection



@endsection