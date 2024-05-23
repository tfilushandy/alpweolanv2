@extends('layouts.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="col col-12 mb-2">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              Alamat Pengiriman
            </div>
            <div class="col-auto">
              <a href="{{ URL::to('checkout') }}" class="btn btn-sm btn-danger">
                Tutup
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-stripped">
              <thead>
                <tr>
                  <th>ID GAME</th>
                  <th>NO WA</th>
                  <th>EMAIL</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach($itemalamatpengiriman as $pengiriman)
                <tr>
        <td>
          {{ $pengiriman->IDGAME }}
        </td>
        <td>
          {{ $pengiriman->no_tlp }}
        </td>
        <td>
          {{ $pengiriman->EMAIL }}
        </td>
                  <td>
                    <form action="{{ route('alamatpengiriman.update',$pengiriman->id) }}" method="post">
                      @method('patch')
                      @csrf()
                      @if($pengiriman->status == 'utama')
                      <button type="submit" class="btn btn-primary btn-sm" disabled>Set Utama</button>
                      @else
                      <button type="submit" class="btn btn-primary btn-sm">Set Utama</button>
                      @endif
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col col-8">
      <div class="card">
        <div class="card-header">
          Form Alamat Pengiriman
        </div>
        <div class="card-body">
          @if(count($errors) > 0)
          @foreach($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
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
          <form action="{{ route('alamatpengiriman.store') }}" method="post">
            @csrf()
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="IDGAME">ID GAME</label>
                  <input type="text" name="IDGAME" class="form-control" value={{old('IDGAME') }}>
                </div>
                <div class="form-group">
                  <label for="no_telp">NO WA</label>
                  <input type="text" name="no_tlp" class="form-control" value={{old('no_tlp') }}>
                </div>
                <div class="form-group">
                  <label for="EMAIL">EMAIL</label>
                  <input type="text" name="EMAIL" class="form-control" value={{old('EMAIL') }}>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
