@extends('layouts.template')
@section('content')
<div class="container-fluid">
  <div class="row" style="margin-left:100px; margin-right:100px;">
    <div class="col">

          <h3 class="text-left">Wishlist</h3>

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
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Produk</th>
                  <th>Nama Produk</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($itemwishlist as $wish)
                <tr>
                  <td>
                    {{ ++$no }}
                  </td>
                  <td>
                    {{ $wish->produk->kode_produk }}
                  </td>
                  <td>
                    <a href="{{ URL::to('product/'.$wish->produk->slug_produk ) }}" style="color: black; text-decoration: none;">{{ $wish->produk->nama_produk }}</a>
                  </td>
                  <td>
                    <form action="{{ route('wishlist.destroy', $wish->id) }}" method="post" style="display:inline;">
                      @csrf
                      {{ method_field('delete') }}
                      <button type="submit" class="btn btn-sm mb-2">
                        Hapus
                      </button>                    
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $itemwishlist->links() }}
          </div>


    </div>
  </div>
</div>
@endsection