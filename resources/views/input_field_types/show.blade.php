@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show Input Field Type</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Input Field Types Table</a></li>
                        <li class="breadcrumb-item active">Show Input Field Type</li>
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
                            <a class="btn btn-success" href="{{ route('input_field_types.index') }}"> Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">

                                    <div class="row">
                                        <div class="col-12 text-center">
                                            <h1 class="">{{$inputFieldType?->input_type }}</h1>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                    <span class="info-box-number text-center  mb-0"> <a class="btn btn-primary" href="{{ route('input_field_types.edit',$inputFieldType?->id) }}">Edit</a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <div class="info-box bg-light">
                                                <div class="info-box-content">
                                                    <span class="info-box-number text-center text-muted mb-0">
                                                        <form action="{{ route('input_field_types.destroy',$inputFieldType?->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection