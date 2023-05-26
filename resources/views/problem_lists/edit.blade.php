@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Question</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Questions Table</a></li>
                            <li class="breadcrumb-item active">Update Question</li>
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
                                <h3 class="card-title">Edit Question Information</h3>
                            </div>

                            <form action="{{ route('problem_lists.update',$problem_list?->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="problem" class="col-md-4 col-form-label text-md-end">{{ __('Question') }}</label>

                                    <div class="col-md-6">
                                        <input id="problem" type="text" class="form-control @error('problem') is-invalid @enderror" name="problem" value="{{ $problem_list?->problem }}" required autocomplete="name" autofocus>

                                        @error('problem')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- <div class="row mb-3">
                                    <label for="url" class="col-md-4 col-form-label text-md-end">{{ __('Url') }}</label>

                                    <div class="col-md-6">
                                        <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ $problem_list?->url }}" required autocomplete="url" autofocus>

                                        @error('url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div> -->

                                <div class="row mb-3">
                                    <label for="anwser" class="col-md-4 col-form-label text-md-end">{{ __('Anwser') }}</label>
                                    <div class="col-md-6">


                                        <textarea id="anwser" type="text" class="form-control @error('anwser') is-invalid @enderror" rows="8" name="anwser" value="{{ old('anwser') }}" required autocomplete="anwser" autofocus>{{ $problem_list?->anwser }}</textarea>
                                        @error('anwser')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="likes" class="col-md-4 col-form-label text-md-end">{{ __('Likes') }}</label>
                                    <div class="col-md-6">
                                        <input id="likes" type="number" class="form-control @error('likes') is-invalid @enderror" name="likes" value="{{ $problem_list?->likes }}" required autocomplete="likes" autofocus>
                                        @error('likes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="disLikes" class="col-md-4 col-form-label text-md-end">{{ __('Dislikes') }}</label>
                                    <div class="col-md-6">
                                        <input id="disLikes" type="number" class="form-control @error('disLikes') is-invalid @enderror" name="disLikes" value="{{ $problem_list?->disLikes }}" required autocomplete="disLikes" autofocus>
                                        @error('disLikes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="category_id" class="col-md-4 col-form-label text-md-end">{{ __('Select Category') }}</label>
                                    <div class="col-md-6">

                                        <select class="form-control" id="category_id" name="category_id" required>
                                            <option value="" disabled selected>--Select Category--</option>
                                            @foreach ($categories as $category)
                                            <option value="" disabled>{{$category?->name}}</option>
                                            @if($category?->subcategories)
                                            @foreach ($category?->subcategories as $subcategories)
                                            <option value="{{$subcategories?->id}}" {{$problem_list?->category_id == $subcategories?->id  ? 'selected' : ''}}>{{$subcategories?->name}}</option>
                                            @endforeach
                                            @endif
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="post_type_id" class="col-md-4 col-form-label text-md-end">{{ __('Select Type') }}</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="post_type_id" name="post_type_id" required>
                                            <option value="" disabled selected>--Select Type--</option>
                                            @foreach ($post_types as $post_type)
                                            <option value="{{$post_type?->id}}" {{$problem_list?->post_type_id == $post_type?->id  ? 'selected' : ''}}>{{$post_type?->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="filename" class="col-md-4 col-form-label text-md-end">{{ __('Filename') }}</label>

                                    <div class="col-md-6">
                                        <input id="filename" type="text" class="form-control @error('filename') is-invalid @enderror" name="filename" value="{{ $problem_list?->filename }}" required autocomplete="filename" autofocus>

                                        @error('filename')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-primary" href="{{ route('problem_lists.index') }}"> Back</a>

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