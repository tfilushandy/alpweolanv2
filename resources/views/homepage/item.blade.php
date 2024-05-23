@extends('layouts.template')
@section('content')
<div class="container" style="margin-top:70px;">
  <!-- kategori produk -->
  <div class="row mt-4">
    <div class="col col-md-12 col-sm-12 mb-4">
      <h2 class="text-center">Kategori Produk</h2>
    </div>
    @foreach($itemkategori as $kategori)
    <!-- kategori pertama -->
    <div class="border border-0 mx-1 rounded kategori col">
      <div class=" card m-4 mb-4 shadow-sm">
        <a href="{{ URL::to('item/category/'.$kategori->slug_kategori) }}">
          <img src="/images/diamondml.jpg" alt="{{ $kategori->nama_kategori }}" class="card-img-top">
        </a>
        <div class="card-body bg-light">
            <h3 class="card-title fs-3">
                <a href="{{ URL::to('item/category/'.$kategori->slug_kategori) }}" class="text-center text-decoration-none text-secondary">
                    <p class="card-text">{{ $kategori->nama_kategori }}</p>
                  </a>
            </h3>
        </div>
      </div>
    </div>
    @endforeach
  <!-- end kategori produk -->
  <!-- produk Promo-->
  <div class="row mt-4">
    <div class="col col-md-12  col-sm-12 mb-4">
      <h2 class="text-center">Promo</h2>
    </div>
    @foreach($itempromo as $promo)
    <!-- produk pertama -->
    <div class="border border-0 mx-1 rounded kategori col-md-4">
      <div class="card m-4 mb-4 shadow-sm">
        <a href="{{ URL::to('item/product/'.$promo->produk->slug_produk) }}">
          @if($promo->produk->foto != null)
          <img src="{{\Storage::url($promo->produk->foto) }}" alt="{{ $promo->produk->nama_produk }}" class="card-img-top">
          @else
          <img src="{{asset('images/bag.jpg') }}" alt="{{ $promo->produk->nama_produk }}" class="card-img-top">
          @endif
        </a>
        <div class="card-body bg-light">
            <h4>
                <a href="{{ URL::to('item/product/'.$promo->produk->slug_produk) }}" class="text-decoration-none text-secondary">
                    <p class="card-text">
                      {{ $promo->produk->nama_produk }}
                    </p>
                  </a>
            </h4>
          <div class="row mt-4">
            <div class="col">
              <button class="btn btn-light">
                <i class="far fa-heart"></i>
              </button>
            </div>
            <div class="col-auto">
              <p>
                <del>Rp. {{ number_format($promo->harga_awal, 2) }}</del>
                <br />
                Rp. {{ number_format($promo->harga_akhir, 2) }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  <!-- end produk promo -->
  <!-- produk Terbaru-->
  <div class="row mt-4">
    <div class="col col-md-12 col-sm-12 mb-4">
      <h2 class="text-center">Terbaru</h2>
    </div>
    @foreach($itemproduk as $produk)
    <!-- produk pertama -->
    <div class="border border-0 mx-1 rounded kategori col-md-3 my-1">
      <div class="card m-4 mb-4 shadow-sm">
        <a href="{{ URL::to('item/product/'.$produk->slug_produk) }}">
          @if($produk->foto != null)
          <img src="{{ \Storage::url($produk->foto) }}" alt="{{ $produk->nama_produk }}" class="card-img-top">
          @else
          <img src="{{ asset('images/bag.jpg') }}" alt="{{ $produk->nama_produk }}" class="card-img-top">
          @endif
        </a>
        <div class="card-body bg-light">
            <h4>
                <a href="{{ URL::to('item/product/'.$produk->slug_produk ) }}" class="text-decoration-none text-secondary">
                    <p class="card-text">
                      {{ $produk->nama_produk }}
                    </p>
                </a>
            </h4>
          <div class="row mt-4">
            <div class="col">
              <button class="btn btn-light">
                <i class="far fa-heart"></i>
              </button>
            </div>
            <div class="col-auto">
              <p>
                Rp. {{ number_format($produk->harga, 2) }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
</div>
@endsection
