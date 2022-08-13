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

    <title>Login #8</title>
  </head>
  <body>



  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign In to <strong>POS-System</strong></h3>
              <p class="mb-4"></p>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group first">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>



              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                @if (Route::has('password.request'))
                <span class="ml-auto"><a href="{{ route('password.request') }}" class="forgot-pass">Forgot Password</a></span>
                @endif
              </div>


              <input type="submit" value="Log In" class="btn text-white btn-block btn-primary">

              <span class="d-block text-left my-4 text-muted"> or sign in with</span>

              <div class="social-login">
                <a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span>
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span>
                </a>
                <a href="#" class="google">
                  <span class="icon-google mr-3"></span>
                </a>
              </div>
            </form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


    <script src="{{ asset('assets/auth/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('assets/auth/js/popper.min.js')}}"></script>
    <script src="{{ asset('assets/auth/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/auth/js/main.js')}}"></script>
  </body>
</html>
{{-- <x-layout.applayout login>
    <div class="login-form">
<x-utilities.banner title="Login">
    <div class="container p-0 py-3" style="">
        <form method="POST" action="{{ route('login') }}" class="px-5 pt-3">
            @csrf
            <div class="form-group">
                <label for="email" class="bmd-label-floating">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="bmd-label-floating">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            @if (Route::has('password.request'))
                <a class="btn btn-link text-dar  pull-right" style="padding: 0px" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif

            <div class="my-3 ">
                <div class="form-check">
                    <input class="form-check-inpu m-0" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label text-dar" style="padding-left: 10px"  for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <div class="mb-0 mt-4 d-flex justify-content-between align-items-center">
                <a class="mt-3 d-block" style="font-size: 14px" href="/register">Don't have an account</a>
                <button type="submit" class="btn btn-primary pull-righ">
                    {{ __('Login') }}
                </button>
            </div>

            <div class="clearfix"></div>
        </form>
    </div>
</x-utilities.banner>
</div>
</x-layout.applayout> --}}
