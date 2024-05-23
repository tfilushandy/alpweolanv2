@extends('layouts.template')
@section('content')
<div class="wrapper1">
    <h4 class="pb-4 border-bottom" style="letter-spacing: -1px; font-weight: 400; color: white">Account settings</h4>
    <div class="d-flex align-items-start py-3 border-bottom">
        <img src="{{ asset('img/user1-128x128.jpg') }}"
            class="img" alt="" style="width: 125px; height: 125px; border-radius: 6px; object-fit: cover;">
        <div class="pl-sm-4 pl-2" id="img-section">
            <b style="margin-left:6px;color: white">Profile Photo</b></br>
            <button class="btn border button flex-row-reverse" style="background-color:white; ">Update profile</button>
        </div>
    </div>
    <div class="py-2">
        <div class="row py-2"> 
            <div class="col-md-6">
                <label for="name" style="margin-bottom: 0;font-size: 14px;font-weight: 500;color: white;padding-left: 3px;">Name</label>
                <input type="text" class="bg-light form-control" placeholder="Steve" style="border-radius: 10px;" value="{{ Auth::user()->name }}" disabled>
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="lastname" style="margin-bottom: 0;font-size: 14px;font-weight: 500;color: white;padding-left: 3px;">Role</label>
                <input type="text" class="bg-light form-control" placeholder="Smith" style="border-radius: 10px;" value="{{ Auth::user()->role }}" disabled>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
                <label for="email" style="margin-bottom: 0;font-size: 14px;font-weight: 500;color: white;padding-left: 3px;">Email Address</label>
                <input type="text" class="bg-light form-control" placeholder="user@email.com" style="border-radius: 10px;" value="{{ Auth::user()->email }}" disabled>
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="phone" style="margin-bottom: 0;font-size: 14px;font-weight: 500;color: white;padding-left: 3px;">Phone Number</label>
                <input type="text" class="bg-light form-control" placeholder="+1 213-548-6015" style="border-radius: 10px;" value="{{ Auth::user()->phone }}" disabled>
            </div>
        </div>
        <div class="row py-2">
            <div class="col">
                <label for="email" style="margin-bottom: 0;font-size: 14px;font-weight: 500;color: white;padding-left: 3px;">Address</label>
                <input type="text" class="bg-light form-control" placeholder="jalan-jalan" style="border-radius: 10px;" value="{{ Auth::user()->alamat }}" disabled>
            </div>
        </div>
    </div>
</div>

@endsection

<style>
    .wrapper1 {
        background: linear-gradient(to right, #3354e7, slategray);
        padding: 30px 50px;
        border: 0px solid #ddd;
        border-radius: 15px;
        margin: 10px auto;
        max-width: 600px;
    }
</style>
