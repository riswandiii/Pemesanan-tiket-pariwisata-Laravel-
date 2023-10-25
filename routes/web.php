<?php

use App\Http\Controllers\BuktiPembayaranController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\ComentController;
use App\Http\Controllers\ComenttController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\ParawisataController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfilCOntroller;
use App\Http\Controllers\UserController;
use App\Models\Pesanan;
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


// Route untuk menampilkan home
Route::get('/', [HomeController::class, 'index'])->middleware('auth');
Route::get('/contact-us', [HomeController::class, 'contact'])->middleware('auth');

// Route ke loginRegistercontroller 
Route::get('/login', [LoginRegisterController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [LoginRegisterController::class, 'register'])->middleware('guest');
Route::post('/register', [LoginRegisterController::class, 'registerProses']);
Route::post('/login' , [LoginRegisterController::class, 'loginProses']);
Route::post('/logout', [LoginRegisterController::class, 'logout']);

Route::get('/dashboard', function(){
    return view('dashboard.index', [
        'title' => 'PARIWISATA E-TIKET'
    ]);
})->middleware('admin');

// Route untuk masuk di ProfilC ontroller
Route::get('/my-profil', [ProfilCOntroller::class, 'profil'])->middleware('auth');

// Route untuk masuk di ParawisataController dengan method resource
Route::resource('/dashboard/pariwisata', ParawisataController::class)->middleware('admin');

// Route untuk masuk di ComentContreller
Route::get('/comentar/{id}', [ComenttController::class, 'index'])->middleware('auth');
Route::post('/comentar', [ComenttController::class, 'coment'])->middleware('auth');
Route::post('/like', [ComenttController::class, 'like'])->middleware('auth');

// Route untuk masuk di PemesananController
Route::get('/pesan/{id}', [PemesananController::class, 'index'])->middleware('auth');
Route::post('/pesan/{id}', [PemesananController::class, 'pesan'])->middleware('auth');
Route::get('/keranjang/{id}', [PemesananController::class, 'keranjang'])->middleware('auth');
Route::delete('/delete-pesanan/{id}', [PemesananController::class, 'deletePesanan'])->middleware('auth');
Route::get('/checkout-pesanan/{id}', [PemesananController::class, 'viewCheckout'])->middleware('auth');
Route::get('/checkout/{id}', [PemesananController::class, 'checkout'])->middleware('auth');
Route::get('/history-pemesanan/{id}', [PemesananController::class, 'history'])->middleware('auth');
Route::post('/upload-bukti-pembayaran', [PemesananController::class, 'uploadBuktiTf'])->middleware('auth');

// Route untuk masuk di CetakController
Route::get('/cetak-tiket/{id}', [CetakController::class, 'cetak'])->middleware('auth');
Route::get('/export-pariwisata-pdf', [CetakController::class, 'pdfPariwisata'])->middleware('admin');

// Route untuk masuk di UserController
Route::get('/dashboard/custumers', [UserController::class, 'index'])->middleware('admin');
Route::get('/dashboard/pdf-custumer', [UserController::class, 'pdf'])->middleware('admin');
Route::get('/dashboard/custumers/{user:id}', [UserController::class, 'show'])->middleware('admin');

// Route untuk masuk di EditProfileController
Route::post('/edit-profile/{id}', [EditProfileController::class, 'index'])->middleware('auth');

// Route untuk masuk di PesananController
Route::get('/dashboard/pesanan', [PesananController::class, 'index'])->middleware('admin');
Route::get('/dashboard/pdf-pesanan', [PesananController::class, 'pdf'])->middleware('admin');
Route::get('/dashboard/pesanan/{id}', [PesananController::class, 'detailPesanan'])->middleware('auth');

// Route untuk masuk di BuktiPembayaranController
Route::get('/dashboard/bukti-pembayaran', [BuktiPembayaranController::class, 'index'])->middleware('admin');
Route::get('/dashboard/pdf-pesanan-detail', [BuktiPembayaranController::class, 'pdf'])->middleware('admin');  