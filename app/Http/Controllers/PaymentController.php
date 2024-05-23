<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Order; // Sesuaikan dengan model order Anda

class PaymentController extends Controller
{
    public function createTransaction(Request $request)
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        // Buat order baru di database
        $order = Order::create([
            'invoice' => 'INV-' . time(),
            'amount' => $request->amount,
            'status' => 'pending'
        ]);

        // Data transaksi
        $transaction = [
            'transaction_details' => [
                'order_id' => $order->invoice,
                'gross_amount' => $order->amount,
            ],
            'customer_details' => [
                'first_name' => $request->first_name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]
        ];

        // Buat transaksi Midtrans
        $snapToken = Snap::getSnapToken($transaction);

        return response()->json(['snap_token' => $snapToken]);
    }

    public function paymentCallback(Request $request)
    {
        $serverKey = config('services.midtrans.serverKey');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                // Pembayaran berhasil
                $order = Order::where('invoice', $request->order_id)->first();
                $order->status = 'paid';
                $order->save();
            }
        }

        return response()->json(['message' => 'Payment status updated']);
    }
}
