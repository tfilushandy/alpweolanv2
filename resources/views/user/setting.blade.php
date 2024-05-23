@extends('layouts.dashboard')
@section('content')
<div class="wrapper bg-white mt-sm-5" style="padding: 30px 50px; border: 1px solid #ddd; border-radius: 15px; margin: 10px auto; max-width: 600px;">
    <h4 class="pb-4 border-bottom" style="letter-spacing: -1px; font-weight: 400;">Account settings</h4>
    <div class="d-flex align-items-start py-3 border-bottom">
        <img src="{{ asset('img/user1-128x128.jpg') }}"
            class="img" alt="" style="width: 70px; height: 70px; border-radius: 6px; object-fit: cover;">
        <div class="pl-sm-4 pl-2" id="img-section">
            <b>Profile Photo</b>
            <p>Accepted file type .png. Less than 1MB</p>
            <button class="btn-sm btn-outline-dark py-0" style="font-size: 0.8em;"><b>Upload</b></button>
        </div>
    </div>
    <div class="py-2">
        <div class="row py-2"> 
            <div class="col-md-6">
                <label for="firstname" style="margin-bottom: 0;font-size: 14px;font-weight: 500;color: #777;padding-left: 3px;">First Name</label>
                <input type="text" class="bg-light form-control" placeholder="Steve" style="border-radius: 10px; ">
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="lastname" style="margin-bottom: 0;font-size: 14px;font-weight: 500;color: #777;padding-left: 3px;">Last Name</label>
                <input type="text" class="bg-light form-control" placeholder="Smith" style="border-radius: 10px;">
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
                <label for="email" style="margin-bottom: 0;font-size: 14px;font-weight: 500;color: #777;padding-left: 3px;">Email Address</label>
                <input type="text" class="bg-light form-control" placeholder="steve_@email.com" style="border-radius: 10px;">
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="phone" style="margin-bottom: 0;font-size: 14px;font-weight: 500;color: #777;padding-left: 3px;">Phone Number</label>
                <input type="tel" class="bg-light form-control" placeholder="+1 213-548-6015" style="border-radius: 10px;">
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
                <label for="country" style="margin-bottom: 0;font-size: 14px;font-weight: 500;color: #777;padding-left: 3px;">Country</label>
                <select name="country" id="country" class="bg-light" style="display: block; width: 100%; border: 1px solid #ddd;border-radius: 10px;height: 40px;padding: 5px 10px;">
                    <option value="india" selected>India</option>
                    <option value="usa">USA</option>
                    <option value="uk">UK</option>
                    <option value="uae">UAE</option>
                </select>
            </div>
            <div class="col-md-6 pt-md-0 pt-3" id="lang">
                <label for="language" style="margin-bottom: 0;font-size: 14px;font-weight: 500;color: #777;padding-left: 3px;">Language</label>
                <div class="arrow">
                    <select name="language" id="language" class="bg-light" style="display: block; width: 100%; border: 1px solid #ddd;border-radius: 10px;height: 40px;padding: 5px 10px;">
                        <option value="english" selected>English</option>
                        <option value="english_us">English (United States)</option>
                        <option value="enguk">English UK</option>
                        <option value="arab">Arabic</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="py-3 pb-4 border-bottom">
            <button class="btn btn-primary mr-3" style="color:black">Save Changes</button>
            <button class="btn border button">Cancel</button>
        </div>
        <div class="d-sm-flex align-items-center pt-3" id="deactivate">
            <div>
                <b>Deactivate your account</b>
                <p>Details about your company account and password</p>
            </div>
            <div class="ml-auto">
                <button class="btn danger">Deactivate</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-4 col-md-4">
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img src="{{ asset('img/user1-128x128.jpg') }}" alt="profil" class="profile-user-img img-responsive img-circle">
          </div>
          <form action="">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <input type="file" name="foto" id="foto">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Upload</button>
                </div>
              </div>
            </div>
          </form>
          <hr>
          <form action="">
            <div class="form-group">
              <label for="name">Nama</label>
              <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
              <label for="phone">No Tlp</label>
              <input type="text" name="phone" id="phone" class="form-control">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
          
        </div>
      </div>      
    </div>
  </div>
</div>
@endsection