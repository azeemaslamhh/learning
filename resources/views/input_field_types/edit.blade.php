@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Input Field Type</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Input Field Types Table</a></li>
                            <li class="breadcrumb-item active">Update Input Field Type</li>
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
                                <h3 class="card-title">Edit Input Field Type Information</h3>
                            </div>

                            <form action="{{ route('input_field_types.update',$inputFieldType?->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <label for="input_type" class="col-md-4 col-form-label text-md-end">{{ __('Input Field Type Name') }}</label>

                                        <div class="col-md-6">
                                            <input id="input_type" type="text" class="form-control @error('input_type') is-invalid @enderror" name="input_type" value="{{ $inputFieldType?->input_type }}" required autocomplete="input_type" autofocus>

                                            @error('input_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>




                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            <a class="btn btn-primary" href="{{ route('input_field_types.index') }}"> Back</a>

                                        </div>
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