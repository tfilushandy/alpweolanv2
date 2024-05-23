@extends('layouts.template')
@section('content')
<div class="bg-auth">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card text-white" style="border-radius: 1rem; background: linear-gradient(to right, #3354e7, slategray);">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <div class="d-flex flex-column align-items-center">
                                <h1>Sign In</h1>
                                <div class="text-center">Halo Gamers
                                    <br>Silahkan login di sini!
                                </div>
                                <form method="POST" action="{{ route('login') }}" class="form-auth">
                                    @csrf
                                    <div class="mt-5" style="background:linear-gradient(to right, #3354e7, slategray);">
                                        <input id="email" type="email" class="form-input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="current-email" autofocus placeholder="Email Address" style="background:white">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mt-4" style="background:linear-gradient(to right, #3354e7, slategray);">
                                        <input id="password" type="password" class="form-input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" autofocus placeholder="Password" style="background:white">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div><br>
                                    <input type="checkbox" id="rememberme" name="rememberme" value="rememberme">
                                    <label for="rememberme" style="color:black"> Remember Me</label>
                                    <br>
                                    @if (Route::has('password.request'))
                                    <a class="btn-link" href="{{ route('password.request') }}" style="color:black;">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                    <br>
                                    <button type="submit" class="btn btn-outline mt-2" style="background:white;">
                                        {{ __('Sign In') }}
                                    </button>
                                    <p class="mt-2">Don't have an account??
                                        <a href="{{ route('register') }}" style="color:black;"> Sign Up here</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.bg-auth {
    background-image: url('/images/BG4.jpg');
    background-size: cover;
    background-position: top;
    background-repeat: no-repeat;
    border: 0px;
    position: relative;
    margin-top: -24px;
}
</style>
@endsection
