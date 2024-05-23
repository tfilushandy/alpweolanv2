@extends('layouts.template')
@section('content')

<div class="container" style="width: 2500px; height: 500px;">


  <!-- carousel-->
  <div class="row">
  <div class="col">
    <div id="gambardigeser" class="carousel slide shake-on-hover" data-ride="carousel" style="margin-bottom: 30px;">
    <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/images/BG1.jpeg" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="/images/BG2.jpg" class="d-block w-100">
      </div>
        <div class="carousel-item">
          <img src="/images/BG4.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="/images/BG6.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="/images/BG7.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="/images/BG8.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="/images/BG9.jpg" class="d-block w-100">
        </div>
      </div>
      <a class="carousel-control-prev" href="#gambardigeser" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#gambardigeser" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>




  <!-- end carousel -->


  <!-- kategori -->
  <div class="card" style="padding: 20px; background-image:linear-gradient(#4139d4, #a0adeb); border:none;">
    <div class="bg-transparent">
      <h2 class="text-center" style="font-weight:bold; margin-bottom: 20px; color:white">Product Category</h2>
      <div class="btn-group d-flex flex-wrap shadow-none mt-1 mt-lg-1 mt-md-1 mt-xl-1 ms-2 ms-lg-2 ms-md-2 ms-xl-2">
        @foreach($itemkategori as $kategori)
        <a style="width: 150px; font-size: 13px; font-weight:bold; font-family: 'Poppins' sans-serif; background-color:#a0adeb; color:white" href="{{ URL::to('category/'.$kategori->slug_kategori) }}" class="btn mt-1 mt-lg-1 mt-md-1 mt-xl-1 mx-2 mx-lg-2 mx-md-2 mx-xl-2 rounded">
          {{ $kategori->nama_kategori }}</span>
        </a>
        @endforeach
      </div>
    </div>
  </div>
  <!-- end kategori -->


<!-- produk Promo-->
  <div class="row mt-4">
    <div class="col col-md-12 col-sm-12 mb-4">
      <h2 class="text-left" style="font-weight:bold; color:white;">Product Promo</h2>
    </div>
    @foreach($itempromo as $promo)
    <div class="col-md-4">
      <div class="card mb-4" style="box-shadow: 5px 6px 6px 2px #4139d4;">
        <div style="height: 190px; max-width: 270px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
          <a href="{{ URL::to('product/'.$promo->produk->slug_produk) }}">
          @if($promo->produk->foto != null)
            <img src="{{\Storage::url($promo->produk->foto) }}" alt="{{ $promo->produk->nama_produk }}" class="card-img-top" style="max-height: 190px; width: 100%;">
          @else
            <img src="{{asset('images/bag.jpg') }}" alt="{{ $promo->produk->nama_produk }}" class="card-img-top" style="max-height: 190px; width: 100%;">
          @endif
          </a>
        </div>
        <div class="card-body" style="border:none; background-color: white;">
          <div class="row mt-4">
            <div class="col">
              <a class="text-decoration-none" style="color: white;">
                <p class="card-text h4">
                  <strong>{{ $promo->produk->nama_produk }}</strong>
                </p>
              </a>
            </div>
            <div class="col-auto">
              <p>
                <del>Rp. {{ number_format($promo->harga_awal, 2) }}</del><br />
                Rp. {{ number_format($promo->harga_akhir, 2) }}
              </p>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col">
              <a class="btn" href="{{ URL::to('product/'.$promo->produk->slug_produk) }}">
                Detail
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <!-- end produk promo -->


  


  <!-- produk Terbaru-->
  <div class="row mt-4">
    <div class="col col-md-12 col-sm-12 mb-4" >
      <h2 class="text-left" style="font-weight:bold; color:white;">New Product</h2>
    </div>
    @foreach($itemproduk as $produk)
    <div class="col-md-4">
      <div class="card mb-4" style="box-shadow: 5px 6px 6px 2px #e9ecef;">
        <div style="height: 190px; max-width: 270px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
          <a href="{{ URL::to('product/'.$produk->slug_produk ) }}">
          @if($produk->foto != null)
            <img src="/images/diamondml.jpg" alt="{{ $produk->nama_produk }}" class="card-img-top" style="max-height: 190px; width: 100%;">
          @else
            <img src="/images/diamondml.jpg" alt="{{ $produk->nama_produk }}" class="card-img-top" style="max-height: 190px; width: 100%;">
          @endif
          </a>
        </div>
        <div class="card-body" style="border:none; background-image: linear-gradient(to right, #3354e7, white);">
          <div class="row mt-4">
            <div class="col">  
              <a class="text-decoration-none" style="color: black;">
                <p class="card-text h4">
                <strong>{{ $produk->nama_produk }}</strong>
                </p>
              </a>
            </div>
            <div class="col-auto">
              <p>
                Rp. {{ number_format($produk->harga, 2) }}
              </p>
            </div>
          <div class="row mt-4">
            <div class="col">
              <a class="btn" style="background-color:white" href="{{ URL::to('product/'.$produk->slug_produk ) }}">
                Detail
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <!-- end produk terbaru -->


</div>
@endsection

<style>
  .carousel-item img,.carousel-control-prev,.carousel-control-next {
  border-radius: 10px; /* mengatur tingkat lengkungan sudut */
  border: 0px solid #ccc; /* menambahkan border dengan ketebalan 2px dan warna abu-abu */
}

/* Shake animation on hover */
.shake-on-hover:hover {
  animation: shake 0.5s ease;
}

@keyframes shake {
  0% { transform: translateX(0); }
  25% { transform: translateX(-5px); }
  50% { transform: translateX(5px); }
  75% { transform: translateX(-5px); }
  100% { transform: translateX(0); }
}

</style>