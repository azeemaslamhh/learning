@extends('layouts.app')

@section('content')

<div class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
            <a  class="h1"><b>Education</b> Portal</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" placeholder="EMail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>


                </form>
                <div class="row">
                    <div class="col-12 mt-3 mb-1  text-center">
                        <a class="btn btn-link" href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>

                    </div>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>

</div>

@endsection