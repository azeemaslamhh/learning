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
                    <h1>Input Field Types</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Input Field Types</li>
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

                            <a class="btn btn-success float-right" href="{{ route('input_field_types.create') }}"> Create New Type</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Input Field Types</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($input_field_types as $input_field_type)
                                    <tr>
                                        <td>
                                            {{ $input_field_type?->id }}
                                        </td>
                                        <td>
                                            {{ ucfirst($input_field_type?->input_type) }}
                                        </td>

                                        

                                        <td>
                                            <form action="{{ route('input_field_types.destroy',$input_field_type?->id) }}" method="POST">
                                                <a class="btn btn-info" href="{{ route('input_field_types.show',$input_field_type?->id) }}">Show</a>
                                                <a class="btn btn-primary" href="{{ route('input_field_types.edit',$input_field_type?->id) }}">Edit</a>
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