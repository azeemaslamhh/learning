@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                @if (session()->has('error_messages'))
                <div class="alert alert-danger">
                    <ul>
                        @foreach (session('error_messages') as $error_message)
                        @foreach ($error_message as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Course Tag</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Course Tag</a></li>
                            <li class="breadcrumb-item active">Create Course Tag</li>
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
                                <h3 class="card-title">Add Course Tag Information</h3>
                            </div>

                            <form method="POST" action="{{ route('course_tags.store') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus required>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-success" href="{{ route('course_tags.index') }}"> Back</a>

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