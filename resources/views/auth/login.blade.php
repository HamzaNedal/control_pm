@extends('layouts.app')

@section('content')
@push('css')
<style>
    .is-invalid{
        border: 1px solid red !important;
    }
    .red{
        color: red;
    }

</style>

@endpush
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="content" style="margin: 150px auto 10px auto;">
	<!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="{{ route('login') }}" method="post">
        @csrf
		<h3 class="form-title">Sign In</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Enter your Email and password. </span>
        </div>
        @error('email')
        <span class="red" role="alert">
            <div class="alert alert-danger">
                <button class="close" data-close="alert"></button>
                <span>
                    Email or Password is wrong.</span>
            </div>
        </span>
        @enderror
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9 ">Email:</label>
            <input class="form-control form-control-solid placeholder-no-fix " type="email" autocomplete="off" value="{{ old('email') }}"  placeholder="Email" name="email"/>
          
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9 ">Password</label>
            <input class="form-control form-control-solid placeholder-no-fix"  type="password" autocomplete="off" placeholder="Password" name="password"/>
            @error('password')
                <span class="red" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase">Login</button>
			<label class="rememberme check">
			<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}/>Remember </label>
		</div>


	</form>
	<!-- END LOGIN FORM -->


</div>
@endsection
