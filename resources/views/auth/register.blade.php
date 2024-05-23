@extends('layouts.template')
@section('content')
<div class="bg-auth">  
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card text-white" style="border-radius: 1rem; background:linear-gradient(to right, #3354e7, slategray);">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h1>Sign Up</h1>
                            <div class="text-center" >Silahkan daftar di bawah ini!
                            </div><br>
                            <form method="POST" action="{{ route('register') }}">
                            <div class="row">
                                <div class="col">
                                    @csrf
                                    <div class="mt-2">
                                        <input type="text" name="name" id="name" class="form-input form-control" autofocus placeholder="Nama" style="background:white">
                                    </div>
                                    <div class="mt-2">
                                        <input type="text" name="email" id="email" class="form-input form-control" autofocus placeholder="Email" style="background:white">
                                    </div>
                                    <div class="mt-2">
                                        <input type="text" name="alamat" id="alamat" class="form-input form-control" autofocus placeholder="Alamat" style="background:white">
                                    </div>
                                    <div class="mt-2">
                                        <input type="text" name="phone" id="phone" class="form-input form-control" autofocus placeholder="No Telepon" style="background:white">
                                    </div>
                                    <div class="mt-4">
                                        <input type="password" name="password" id="password" class="form-input form-control" autofocus placeholder="Password" style="background:white">
                                    </div>
                                    <div class="mt-2">
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-input form-control" autofocus placeholder="Confirmation Password" style="background:white">
                                    </div>
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-outline mt-3" style="color: black; background:white">Sign-Up</button>
                                        <p class="mt-2">Already have an account?<a href="{{ route('login') }}" style="color: black"> Sign-In here</a></p>
                                    </div>
                                </div>
                            </div>
                            </form>

                            @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                            <div class="alert alert-warning">{{ $error }}
                            @endforeach
                            @endif

                            @if ($message = Session::get('error'))
                            <div class="alert alert-warning">
                                <p>{{ $message }}</p>
                            </div>
                            @endif

                            @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                            @endif
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.bg-auth{
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