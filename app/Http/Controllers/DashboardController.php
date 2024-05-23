<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Produk;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $itemproduk = Produk::orderBy('created_at', 'desc')->paginate(20);
        $countkategori = DB::table('kategori')->count();
        $countproduk = DB::table('produk')->count();
        $countusers = DB::table('users')->count();
        $counttransaksi = DB::table('cart_detail')->count();
        $data = array('title' => 'Dashboard',
                    'itemproduk' => $itemproduk,
                    'countkategori' => $countkategori,
                    'countproduk' => $countproduk,
                    'countusers' => $countusers,
                    'counttransaksi' => $counttransaksi);
        return view('dashboard.index', $data)->with('no', ($request->input('page', 1) - 1) * 20);
    }
}