@extends('layouts.template')
@section('content')
<div class="container" style="margin-bottom:70px;">
  <!-- kategori produk -->
  <div class="card" style="padding: 20px; background-color: #ADC178">
    <div class="bg-transparent" >
      <h2 class="text-left" style="font-weight:bold; margin-bottom: 20px;">Product Category</h2>
        <div class="btn-group d-flex flex-wrap shadow-none mt-1 mt-lg-1 mt-md-1 mt-xl-1 ms-2 ms-lg-2 ms-md-2 ms-xl-2">
          @foreach($itemkategori as $kategori)
            <a style="width: 150px; font-size: 13px; font-weight:bold; font-family: 'Poppins' sans-serif;" href="{{ URL::to('category/'.$kategori->slug_kategori) }}" class="btn mt-1 mt-lg-1 mt-md-1 mt-xl-1 mx-2 mx-lg-2 mx-md-2 mx-xl-2 rounded">
              {{ $kategori->nama_kategori }}</span>
            </a>
          @endforeach
        </div>
    </div>
  </div>
  <!-- end kategori produk -->
  <!-- produk Terbaru-->
  <div class="row mt-4" style="margin-top: 30px; margin-bottom: 30px;">
    <div class="col col-md-12 col-sm-12 mb-4">
      <h2 class="text-left" style="font-weight:bold; margin-bottom: 20px;">Terbaru</h2>
    </div>
    @foreach($itemproduk as $produk)
    <!-- produk pertama -->
    <div class="col-md-4">
      <div class="card mb-4" style="box-shadow: 5px 6px 6px 2px #e9ecef;">
      <div style="height: 190px; max-width: 270px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
        <a href="{{ URL::to('product/'.$produk->slug_produk ) }}">
          @if($produk->foto != null)
          <img src="{{ \Storage::url($produk->foto) }}" alt="{{ $produk->nama_produk }}" class="card-img-top" style="max-height: 190px; width: 100%;">
          @else
          <img src="{{ asset('images/bag.jpg') }}" alt="{{ $produk->nama_produk }}" class="card-img-top" style="max-height: 190px; width: 100%;">
          @endif
        </a>
      </div>
        <div class="card-body" style="border:none; background-color: #ADC178;">
        <div class="row mt-4">
        <div class="col">  
            <a class="text-decoration-none" style="color: black;">
            <p class="card-text h5">
              <strong>{{ $produk->nama_produk }}</strong>
            </p>
          </a>
          </div>
          <div class="col-auto">
              <p>
                Rp. {{ number_format($produk->harga, 2) }}
              </p>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col">
              <a class="btn" href="{{ URL::to('product/'.$produk->slug_produk ) }}">
                Detail
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
</div>
@endsection