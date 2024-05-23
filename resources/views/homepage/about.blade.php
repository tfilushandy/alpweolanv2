@extends('layouts.template')
@section('content')

<div class="container1 d-flex justify-content-center align-items-center">
  <div class="col">
    <div class="d-flex flex-column align-items-center fadeIn">
      <div class="judul-container">
        <h2 class="judul">Tentang Kami</h2>
      </div>
      <div class="text-container">
        <p>Selamat datang di WEOLAN. Kami adalah sebuah platform yang didedikasikan
          untuk memudahkan Anda dalam melakukan top up kebutuhan game. <br>
           Dengan menggunakan metode transaksi otomatis (Auto Transaction Method), <br>
           kami menyediakan layanan yang cepat, aman, dan dapat diandalkan,
           sehingga <br>Anda dapat menikmati pengalaman bermain game tanpa gangguan.</p>
      </div>
    </div>
  </div>
</div>
@endsection

<style>
.container1 {
  height: 50vh;
  border-radius: 30px;
  overflow: hidden;
  position: relative;
  margin: 20px;
  background-image: url('/images/BG2.jpg');
  background-size: cover;
  background-position: top;
  background-repeat: no-repeat;
  border: 0px;
  position: relative;
  margin-top: -24px;
  justify-content: center;
  align-items: center;
}

.judul-container {
  position: absolute;
  top: 20px;
  left: 50%;
  margin-top: -50px;
  transform: translateX(-50%);
  background-color: rgba(0, 0, 0, 0.7);
  padding: 10px 20px;
  border-radius: 10px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
  text-align: center;
}

.judul {
  color: white;
  margin: 0;
}

.text-container {
  background-color: rgba(0, 0, 0, 0.7);
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.5);
  text-align: center;
  color: white;
  margin-top: 60px;
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
</style>
