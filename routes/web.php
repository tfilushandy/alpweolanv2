<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//homepage
Route::get('/',[\App\Http\Controllers\HomepageController::class,'index']);
Route::get('/about', [\App\Http\Controllers\HomepageController::class,'about']);
Route::get('/contact', [\App\Http\Controllers\HomepageController::class,'kontak']);
Route::get('/category', [\App\Http\Controllers\HomepageController::class,'kategori']);
Route::get('/category/{slug}', [\App\Http\Controllers\HomepageController::class,'kategoribyslug']);
Route::get('/product', [\App\Http\Controllers\HomepageController::class,'produk']);
Route::get('/product/{id}', [\App\Http\Controllers\HomepageController::class,'produkdetail']);

Route::get('admin/login', [\App\Http\Controllers\AdminAuthControllerController::class,'getLogin'])->name('admin.login');
Route::post('admin/login', [\App\Http\Controllers\AdminAuthControllerController::class,'postLogin']);

//dashboard admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function() {
    Route::get('/', [\App\Http\Controllers\DashboardController::class,'index']);
    Route::resource('kategori',\App\Http\Controllers\KategoriController::class);
    Route::resource('produk',\App\Http\Controllers\ProdukController::class);
    Route::resource('customer',\App\Http\Controllers\CustomerController::class);
    Route::get('laporan',[\App\Http\Controllers\LaporanController::class,'index']);
    Route::get('proseslaporan',[\App\Http\Controllers\LaporanController::class,'proses']);
    Route::get('image',[\App\Http\Controllers\ImageController::class,'index']);
    Route::post('image',[\App\Http\Controllers\ImageController::class,'store']);
    Route::delete('image/{id}',[\App\Http\Controllers\ImageController::class,'destroy']);
    Route::post('imagekategori',[\App\Http\Controllers\KategoriController::class,'uploadimage']);
    Route::delete('imagekategori/{id}',[\App\Http\Controllers\KategoriController::class,'deleteimage']);
    Route::post('produkimage',[\App\Http\Controllers\ProdukController::class,'uploadimage']);
    Route::delete('produkimage/{id}',[\App\Http\Controllers\ProdukController::class,'deleteimage']);
    Route::resource('slideshow',\App\Http\Controllers\SlideshowController::class);
    Route::resource('promo',\App\Http\Controllers\ProdukPromoController::class);
    Route::get('loadprodukasync/{id}',[\App\Http\Controllers\ProdukController::class,'loadasync']);
});

Route::group(['middleware' => 'auth'], function() {
    Route::resource('cart', \App\Http\Controllers\CartController::class);
    Route::resource('wishlist',\App\Http\Controllers\WishlistController::class);
    Route::get('profile',[\App\Http\Controllers\UserController::class,'index']);
    Route::get('setting',[\App\Http\Controllers\UserController::class,'setting']);
    Route::resource('transaksi',\App\Http\Controllers\TransaksiController::class);
    Route::patch('kosongkan/{id}', [\App\Http\Controllers\CartController::class,'kosongkan']);
    Route::resource('cartdetail', \App\Http\Controllers\CartDetailController::class);
    Route::resource('alamatpengiriman', \App\Http\Controllers\AlamatPengirimanController::class);
    Route::get('checkout',[\App\Http\Controllers\CartController::class,'checkout']);
    Route::post('comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
});

Auth::routes();

Route::get('/home', function() {
    return redirect('/admin');
});


Route::post('/payment/create', [PaymentController::class, 'createTransaction'])->name('payment.createTransaction');
Route::post('/payment/callback', [PaymentController::class, 'paymentCallback'])->name('payment.callback');
