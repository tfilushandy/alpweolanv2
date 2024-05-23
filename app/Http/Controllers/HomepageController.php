<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Slideshow;
use App\Models\ProdukPromo;
use App\Models\Wishlist;
use Auth;

class HomepageController extends Controller
{
    public function index() {
        $itemproduk = Produk::orderBy('created_at', 'desc')->limit(3)->get();
        $itempromo = ProdukPromo::orderBy('created_at', 'desc')->limit(3)->get();
        $itemkategori = Kategori::orderBy('nama_kategori', 'asc')->limit(6)->get();
        $itemslide = Slideshow::get();
        $data = array('title' => 'Kojo',
            'itemproduk' => $itemproduk,
            'itempromo' => $itempromo,
            'itemkategori' => $itemkategori,
            'itemslide' => $itemslide
        );
        return view('homepage.index', $data);
    }

    public function item() {
        $itemproduk = Produk::orderBy('created_at', 'desc')->limit(6)->get();
        $itempromo = ProdukPromo::orderBy('created_at', 'desc')->limit(6)->get();
        $itemkategori = Kategori::orderBy('nama_kategori', 'asc')->limit(6)->get();
        $itemslide = Slideshow::get();
        $data = array('title' => 'Kojo',
            'itemproduk' => $itemproduk,
            'itempromo' => $itempromo,
            'itemkategori' => $itemkategori,
            'itemslide' => $itemslide,
        );
        return view('homepage.item', $data);
    }

    public function about() {
        $data = array('title' => 'About');
        return view('homepage.about', $data);
    }

    public function kontak() {
        $data = array('title' => 'Contact');
        return view('homepage.kontak', $data);
    }

    public function kategori() {
        $itemkategori = Kategori::orderBy('nama_kategori', 'asc')->limit(6)->get();
        $itemproduk = Produk::orderBy('created_at', 'desc')->limit(6)->get();
        $data = array('title' => 'Product Category',
                    'itemkategori' => $itemkategori,
                    'itemproduk' => $itemproduk);
        return view('homepage.kategori', $data);
    }

    public function kategoribyslug(Request $request, $slug) {
        $itemproduk = Produk::orderBy('nama_produk', 'desc')
                            ->where('status', 'publish')
                            ->whereHas('kategori', function($q) use ($slug) {
                                $q->where('slug_kategori', $slug);
                            })
                            ->paginate(18);
        $listkategori = Kategori::orderBy('nama_kategori', 'asc')
                                ->where('status', 'publish')
                                ->get();
        $itemkategori = Kategori::where('slug_kategori', $slug)
                                ->where('status', 'publish')
                                ->first();
        if ($itemkategori) {
            $data = array('title' => $itemkategori->nama_kategori,
                        'itemproduk' => $itemproduk,
                        'listkategori' => $listkategori,
                        'itemkategori' => $itemkategori);
            return view('homepage.produk', $data)->with('no', ($request->input('page') - 1) * 18);            
        } else {
            return abort('404');
        }
    }

    public function produk(Request $request) {
        
        // $min_price = Produk::orderByRaw('harga', 'asc')->get();
        // $max_price = Produk::orderBy('harga', 'desc')->get();
        // $new = Produk::orderBy('created_at', 'desc')->get();
        // $old = Produk::orderBy('created_at', 'asc')->get();
        // $max = $request->input('asc')('desc');
        // $new = $request->query('newest');
        // $old = $request->query('oldest');
        
        // if($search == $min){
        //     $product_search = Produk::orderBy('harga', 'asc')->paginate(18);
        // }elseif($search == $max){
        //     $product_search = Produk::orderBy('harga', 'desc')->paginate(18);
        // }elseif($search == $new){
        //     $product_search = Produk::orderBy('created_at', 'desc')->limit(6)->get();
        // }elseif($search == $old){
        //     $product_search = Produk::orderBy('created_at', 'asc')->limit(6)->get();
        // }else{
        // $product_search = Produk::orderBy('nama_produk', 'desc')
        //                         ->where('status', 'publish')
        //                         ->where('nama_produk', 'LIKE','%'.$search.'%')
        //                         ->paginate(18);
        // }
        $search = $request->query('q');
        
        $product_search = Produk::orderBy('created_at', 'desc')
                                ->where('status', 'publish')
                                ->where('nama_produk', 'LIKE','%'.$search.'%')
                                ->get();

        $listkategori = Kategori::orderBy('nama_kategori', 'asc')
                                ->where('status', 'publish')
                                ->get();

        $data = array('title' => 'Product',
                    'itemproduk' => $product_search,
                    'listkategori' => $listkategori,
                );
        return view('homepage.produk', $data)->with('no', ($request->input('page') - 1) * 18);
    }

    public function produkdetail($id) {
        $itemproduk = Produk::where('slug_produk', $id)
                            ->where('status', 'publish')
                            ->first();
        if ($itemproduk) {
            if (Auth::user()) {//cek kalo user login 
                $itemuser = Auth::user();
                $itemwishlist = Wishlist::where('produk_id', $itemproduk->id)
                                        ->where('user_id', $itemuser->id)
                                        ->first();
                $data = array('title' => $itemproduk->nama_produk,
                        'itemproduk' => $itemproduk,
                        'itemwishlist' => $itemwishlist);
            } else {
                $data = array('title' => $itemproduk->nama_produk,
                            'itemproduk' => $itemproduk);
            }
            return view('homepage.produkdetail', $data);            
        } else {
            // kalo produk ga ada, jadinya tampil halaman tidak ditemukan (error 404)
            return abort('404');
        }
    }
}