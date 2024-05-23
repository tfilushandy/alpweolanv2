@extends('layouts.template')
@section('content')
<div class="container1 d-flex justify-content-center align-items-center" style="height:auto; min-height: 80vh; border-radius: 30px; overflow: hidden; position: relative; padding: 40px;">
  <div class="col-12">
    <div class="d-flex flex-column align-items-center fadeIn">
      <br>
      <div class="judul-container">
        <h2 class="judul">Kontak Kami</h2>
      </div>
      <br>
      <br>
      <div class="d-flex flex-column align-items-center" style="background-color: rgba(0, 0, 0, 0.7); padding: 40px; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5); text-align: center;">
        <h5 style="color: white;">Alamat Kami:</h5>
        <p style="color: white;">Waterfront WP 3 No.5, Bongso Wetan, Citraland, Sambikerep, Surabaya City, East Java 61174</p>
        <br>
        <h5 style="color: white;">Email:</h5>
        <p style="color: white;">weolan@gmail.com</p>
        <br>
        <h5 style="color: white;">Hubungi Kami:</h5>
        <p style="color: white;">+62 895345902896</p>
        <br>
        <div class="d-flex justify-content-center">
          <!-- Add your social media icons here -->
          <a href="your-link-here" target="_blank" style="color: white; margin: 0 10px;"><i class="fab fa-facebook-f"></i></a>
          <a href="your-link-here" target="_blank" style="color: white; margin: 0 10px;"><i class="fab fa-twitter"></i></a>
          <a href="your-link-here" target="_blank" style="color: white; margin: 0 10px;"><i class="fab fa-instagram"></i></a>
          <a href="your-link-here" target="_blank" style="color: white; margin: 0 10px;"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

<style>
.judul-container {
  position: absolute;
  top: 20px;
  margin-top: -1%;
  left: 50%;
  transform: translateX(-50%);
  background-color: rgba(0, 0, 0, 0.7);
  padding: 10px 20px;
  border-radius: 10px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
}

.judul {
  color: white;
  margin: 0;
}

h5, p {
  color: white;
}

.container1 {
  background-image: url('/images/BG7.jpg');
  background-size: cover;
  background-position: top;
  background-repeat: no-repeat;
  border: 2px;
  position: relative;
  margin: 20px;
}

.fadeIn {
  animation: fadeIn 1s ease-in-out;
}

@keyframes fadeIn {
  0% {
    opacity: 0;
    transform: translateY(-20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Add icon styling if necessary */
.fab {
  font-size: 24px;
}
</style>