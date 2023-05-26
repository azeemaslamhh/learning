@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Question Category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Question Category Table</a></li>
                            <li class="breadcrumb-item active">Create Question Category</li>
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
                                <h3 class="card-title">Add Category Information</h3>
                            </div>

                            <form method="POST" action="{{ route('categories.store') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="parent_category_id" class="col-md-4 col-form-label text-md-end">{{ __('Select Sub Category OF') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="parent_category_id" name="parent_category_id">
                                            <option value="" disabled selected>--Select Category--</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category?->id}}">{{$category?->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-success" href="{{ route('categories.index') }}"> Back</a>

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