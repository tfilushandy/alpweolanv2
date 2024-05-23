@extends('layouts.template')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-8">
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
      <div class="row mb-2">
        <div class="col-12 mb-2">
          <div class="card">
            <div class="card-header">
              Item
            </div>
            <div class="card-body">
              <table class="table table-stripped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Diskon</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($itemcart->detail as $detail)
                  <tr>
                    <td>
                    {{ $no++ }}
                    </td>
                    <td>
                    {{ $detail->produk->nama_produk }}
                    <br />
                    {{ $detail->produk->kode_produk }}
                    </td>
                    <td>
                    {{ number_format($detail->harga, 2) }}
                    </td>
                    <td>
                    {{ number_format($detail->diskon, 2) }}
                    </td>
                    <td>
                    {{ number_format($detail->qty, 2) }}
                    </td>
                    <td>
                    {{ number_format($detail->subtotal, 2) }}
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="card">
            <div class="card-header">Alamat Pengiriman</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-stripped">
                  <thead>
                    <tr>
                      <th>Nama Penerima</th>
                      <th>ID GAME</th>
                      <th>No tlp</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  @if($itemalamatpengiriman)
                    <tr>
                      <td>
                        {{ $itemalamatpengiriman->EMAIL}}
                      </td>
                      <td>
                        {{ $itemalamatpengiriman->IDGAME }}
                      </td>
                      <td>
                        {{ $itemalamatpengiriman->no_tlp }}
                      </td>
                      <td>
                        <a href="{{ route('alamatpengiriman.index') }}" class="btn btn-success btn-sm">
                          Ubah Alamat
                        </a>                        
                      </td>
                    </tr>
                  @endif
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer">
              <a href="{{ route('alamatpengiriman.index') }}" class="btn btn-sm btn-primary">
                Tambah Alamat
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-header">
          Ringkasan
        </div>
        <div class="card-body">
          <table class="table">
            <tr>
              <td>No Invoice</td>
              <td class="text-right">
                {{ $itemcart->no_invoice }}
              </td>
            </tr>
            <tr>
              <td>Subtotal</td>
              <td class="text-right">
                {{ number_format($itemcart->subtotal, 2) }}
              </td>
            </tr>
            <tr>
              <td>Diskon</td>
              <td class="text-right">
                {{ number_format($itemcart->diskon, 2) }}
              </td>
            </tr>
            <tr>
              <td>Total</td>
              <td class="text-right">
                {{ number_format($itemcart->total, 2) }}
              </td>
            </tr>
          </table>
        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#paymentModal">Buat Pesanan</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="paymentModalLabel">Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="paymentDetails" style="display: none;">
        <!-- Payment details content here -->
        <div class="text-center">
          <img src="/images/QRTRY.png" alt="Payment QR Code" class="" style="max-width: 1000px;">
        </div>
        <p>Nominal Total: <strong>{{ number_format($itemcart->total, 2) }}</strong></p>
        <ul class="list-unstyled">
          <li>Bank: Bank BCA</li>
          <li style="position: relative;">
            Nomor Rekening: <span id="accountNumber">1234567890</span>
            <button class="btn btn-primary copy-btn" onclick="copyAccountNumber()">
              <img src="/images/COPY.png" alt="Copy" style="max-width: 20px;">
            </button>
          </li>
          <li>
            <img src="/images/BCA.png" alt="Bank Logo" style="max-width: 100px;">
          </li>
        </ul>
      </div>
      <div class="modal-footer">
        <form action="{{ route('produk.index') }}" method="post">
          @csrf
          <button type="submit" class="btn btn-success" onclick="handlePaymentConfirmation()">Konfirmasi Pembayaran</button>
        </form>
        <button type="button" class="btn btn-secondary" onclick="showPaymentDetails()">Lihat Detail Pembayaran</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Terima Kasih -->
<div class="modal fade" id="thankYouMessage" tabindex="-1" role="dialog" aria-labelledby="thankYouMessageLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="thankYouMessageLabel">Terima Kasih!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center mt-5">
          <h4>Terima kasih telah melakukan pesanan!</h4>
          <p>Orderan kamu segera kami proses. Silakan klik "Siap" untuk kembali ke halaman utama.</p>
        </div>
      </div>
      <div class="modal-footer">
        <a href="/" class="btn btn-primary">Siap</a>
      </div>
    </div>
  </div>
</div>

<script>
  // Function to show payment details
  function showPaymentDetails() {
    document.getElementById("paymentDetails").style.display = "block";
  }

  // Function to handle click event on "Konfirmasi Pembayaran" button
  function handlePaymentConfirmation() {
    // Simulate form submission
    // Replace this with actual form submission logic if needed
    alert("Pembayaran berhasil dikonfirmasi!");

    // Close the modal
    $('#paymentModal').modal('hide');

    // Show thank you message
    $('#thankYouMessage').modal('show');
  }
</script>


<script>
  function copyAccountNumber() {
    var accountNumber = document.getElementById("accountNumber").innerText;
    var tempInput = document.createElement("input");
    tempInput.setAttribute("value", accountNumber);
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand("copy");
    document.body.removeChild(tempInput);
    alert("Nomor Rekening telah disalin: " + accountNumber);
  }

  function showPaymentDetails() {
    document.getElementById("paymentDetails").style.display = "block";
  }
</script>

<style>
.copy-btn {
  background-color: transparent;
  border: none;
  padding: 0; /* Menghapus padding */
  cursor: pointer;
  top: -1;
  right: -400px; /* Sesuaikan jarak dari kanan sesuai kebutuhan */
  width: 20px; /* Menyesuaikan lebar tombol */
  height: 20px; /* Menyesuaikan tinggi tombol */
}


  </style>
@endsection
