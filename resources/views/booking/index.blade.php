@extends('layouts.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="col col-md-8">
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
      <div class="card">
        <div class="card-header">
          Booking
        </div>
        <div class="card-body">
          <table class="table table-stripped">
            <thead>
              <tr>
                <th>No</th>
                <th>Jasa</th>
                <th>Tanggal</th>
                <th>Jam Mulai</th>
                <th>Jam Berakhir</th>
                <th>Subtotal</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($booking->detail as $detail)
              <tr>
                <td>
                {{ $no++ }}
                </td>
                <td>
                {{ $detail->jasa->nama_jasa }}
                <br />
                {{ $detail->jasa->kode_jasa }}
                </td>
                <div class="btn-group" role="group">
                  <form action="{{ route('bookingdetail.update',$detail->id) }}" method="post">
                    <td>
                      @method('patch')
                      @csrf()
                      <input type="date" name="param" id="date">
                    </td>
                    <td>
                      @method('patch')
                      @csrf()
                      <input type="time" name="param" id="time">
                    </td>
                    <td>
                      @method('patch')
                      @csrf()
                      <input type="time" name="param" id="time">
                    </td>
                    <button type="submit" href="/booking" class="btn btn-primary btn-sm">
                      accept
                      </button>
                  </form>
                </div>
                <td>
                {{ number_format($detail->subtotal) }}
                </td>
                <td>
                <form action="{{ route('bookingdetail.destroy', $detail->id) }}" method="post" style="display:inline;">
                  @csrf
                  {{ method_field('delete') }}
                  <button type="submit" class="btn btn-sm btn-danger mb-2">
                    Hapus
                  </button>                    
                </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col col-md-4">
      <div class="card">
        <div class="card-header">
          Ringkasan
        </div>
        <div class="card-body">
          <table class="table">
            <tr>
              <td>No Invoice</td>
              <td class="text-right">
                {{ $booking->no_invoice }}
              </td>
            </tr>
            <tr>
              <td>Harga</td>
              <td class="text-right">
                {{ number_format($booking->harga, 2) }}
              </td>
            </tr>
            <tr>
              <td>Status</td>
              <td class="text-right">
                Pending
              </td>
            </tr>
            <tr>
              <td>Total</td>
              <td class="text-right">
                {{ number_format($booking->total, 2) }}
              </td>
            </tr>
          </table>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="col">
            <a href="{{ URL::to('sewa') }}" class="btn btn-primary btn-block">Checkout</a>
            </div>
            <div class="col">
              <form action="{{ url('kosongkan').'/'.$booking->id }}" method="post">
                @method('patch')
                @csrf()
                <button type="submit" class="btn btn-danger btn-block">Kosongkan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection