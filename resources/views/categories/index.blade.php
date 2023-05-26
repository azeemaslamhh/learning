@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Question Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Question Category</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-success float-right" href="{{ route('categories.create') }}"> Create New category</a>
                        </div>

                        <!-- Default box -->
                        <div class="card card-solid">
                            <div class="card-body pb-0">
                                <div class="row">

                                    @foreach ($categories as $category)

                                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                        <div class="card bg-light d-flex flex-fill">
                                            <div class="card-header text-muted border-bottom-0">
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h1 class="lead"><b>{{ $category?->name }}</b></h1>
                                                        <p class="text-muted text-sm"><b>About: </b> Programming Language </p>
                                                        <ul class="ml-4 mb-0 fa-ul text-muted">

                                                            @if($category?->subcategories)
                                                            @foreach ($category?->subcategories as $key=>$subcategories)
                                                            <l1>{{ $key+1 }} {{ $subcategories?->name }}

                                                                <form action="{{ route('categories.destroy',$subcategories?->id) }}" method="POST">
                                                                    <a class="btn btn-info btn btn-sm" href="{{ route('categories.show',$subcategories?->id) }}">Show</a>

                                                                    <a class="btn btn-primary btn btn-sm" href="{{ route('categories.edit',$subcategories?->id) }}">Edit</a>

                                                                    @csrf
                                                                    @method('DELETE')

                                                                    <button type="submit" onclick="return confirm('Are you sure?')" class=" btn btn-sm btn btn-danger">Delete</button>
                                                                </form>

                                                            </l1><br />


                                                            @endforeach
                                                            @endif
                                                        </ul>

                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-right">
                                                    <form action="{{ route('categories.destroy',$category?->id) }}" method="POST">
                                                        <a class="btn btn-primary btn btn-sm" href="{{ route('categories.edit',$category?->id) }}">Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Are you sure?')" class=" btn btn-sm btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection