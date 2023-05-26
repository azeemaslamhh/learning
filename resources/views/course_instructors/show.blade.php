@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Show Course Instructor {{ $courseInstructor?->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Course Instructor</a></li>
                        <li class="breadcrumb-item active">Show Course Instructor {{ $courseInstructor?->name }}</li>
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
                            <a class="btn btn-success" href="{{ route('course_instructors.index') }}"> Back</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th colspan="2" class="text-center">Instructor's Info</th>
                                        <th>Rating</th>
                                        <th>Experience</th>
                                        <th rowspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $courseInstructor?->id }}</td>
                                        <td>
                                            <img src="{{ asset( $courseInstructor?->image) }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
                                        </td>
                                        <td style=" vertical-align: middle;">
                                            <span class=" brand-text"> <strong>{{ $courseInstructor?->name }}</strong></span>

                                        </td>
                                        <td style="text-align: center;  vertical-align: middle;">

                                            @if(!empty($courseInstructor->rating))
                                            <div class="rated">
                                                @for($i=1; $i<=$courseInstructor->rating; $i++)
                                                    {{-- <input type="radio" id="star{{$i}}" class="rate" name="rating" value="5"/> --}}
                                                    <label class="star-rating-complete" title="text">{{$i}} stars</label>
                                                    @endfor
                                            </div>
                                            @endif
                                        </td>
                                        <td style=" vertical-align: middle;">
                                            <span class=" brand-text"> <strong>{{ $courseInstructor?->experience ?? 0 }} years</strong></span>

                                        </td>
                                        <td style="text-align: center;  vertical-align: middle;">


                                            <form action="{{ route('course_instructors.destroy',$courseInstructor?->id) }}" method="POST">

                                                <a class="btn btn-primary" href="{{ route('course_instructors.edit',$courseInstructor?->id) }}">Edit</a>

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <tr>
                                    <td colspan="4"><strong> {{ $courseInstructor?->detail }}</strong></td>

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



<style>
    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        display: none;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rated:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: #c59b08;
    }

    .star-rating-complete {
        color: #c59b08;
    }

    .rating-container .form-control:hover,
    .rating-container .form-control:focus {
        background: #fff;
        border: 1px solid #ced4da;
    }

    .rating-container textarea:focus,
    .rating-container input:focus {
        color: #000;
    }

    .rated {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rated:not(:checked)>input {
        position: absolute;
        display: none;
    }

    .rated:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ffc700;
    }

    .rated:not(:checked)>label:before {
        content: '★ ';
    }

    .rated>input:checked~label {
        color: #ffc700;
    }

    .rated:not(:checked)>label:hover,
    .rated:not(:checked)>label:hover~label {
        color: #deb217;
    }

    .rated>input:checked+label:hover,
    .rated>input:checked+label:hover~label,
    .rated>input:checked~label:hover,
    .rated>input:checked~label:hover~label,
    .rated>label:hover~input:checked~label {
        color: #c59b08;
    }
</style>