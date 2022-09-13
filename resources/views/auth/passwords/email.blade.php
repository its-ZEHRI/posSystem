{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/auth/fonts/icomoon/style.css ') }} ">

    <link rel="stylesheet" href="{{ asset('assets/auth/css/owl.carousel.min.css') }} ">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/bootstrap.min.css') }} ">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/style.css') }} ">

    <title>Forgot Password</title>
</head>

<body>



    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center order-md-2">
                    <img src="{{ asset('assets/images/imac1.png') }}" alt="Image" width="80%" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4 pt-5">
                                <h3>Forgot <strong>password</strong></h3>
                                <p class="mb-4"></p>
                            </div>
                            <form method="POST" class="pt-5" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                        <input  type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <input type="submit" value="Send Password Reset Link"
                                    class="btn text-white btn-block btn-primary">
                                <a href="/" style="text-decoration: none"><span
                                        class="d-block text-right my-2 text-muted"> back</span></a>

                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="{{ asset('assets/auth/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/auth/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/auth/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/auth/js/main.js') }}"></script>
</body>

</html>
