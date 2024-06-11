<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\TransaksiController;
use App\Models\Transaksi;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');

Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify');
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (Request $request, $id) {
    $user = \App\Models\User::find($id);

    if (!$user) {
        abort(404); // Tindakan yang sesuai jika pengguna tidak ditemukan
    }

    if ($user->hasVerifiedEmail()) {
        return redirect('/home');
    }

    if ($user->markEmailAsVerified()) {
        event(new Verified($user));
    }

    return redirect('/home');
})->name('verification.verify');
Route::get('/home', function () {
return redirect('/');
})->middleware(['auth', 'verified']);
Route::get('/email/resend', [RegisterController::class, 'resend'])->name('verification.resend');

Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');
Route::get('/UserManagement', [UserController::class, 'tabel'])->middleware('auth')->name('UserManagement');
Route::get('/pesanan', [TransaksiController::class, 'tabeltrans'])->middleware('auth')->name('pesanan');
Route::get('/history', [TransaksiController::class, 'history'])->middleware('auth')->name('history');
Route::get('/historys', [TransaksiController::class, 'historys'])->middleware('auth')->name('historys');

Route::get('/tables', [HomeController::class, 'tabeldoc'])->middleware('auth')->name('tables');
Route::get('/count', [DashboardController::class, 'count'])->middleware('auth')->name('count');
Route::get('/barang', [BarangController::class, 'tabelbarang'])->middleware('auth')->name('barang');
Route::get('/search', [BarangController::class, 'tabelbarang'])->middleware('auth')->name('search');
Route::get('/pemesanan/{id}', [TransaksiController::class, 'detailharga'])->middleware('auth')->name('Users.pemesanan');
Route::get('/pesanan/grafik-transaksi-per-bulan', [DashboardController::class, 'grafikTransaksiPerBulan']);
Route::get('/pesanan/grafik-transaksi-per-hari', [LandingController::class, 'grafikTransaksiPerBulan']);

Route::get('/jenis', [BarangController::class, 'jenis'])->middleware('auth')->name('jenis');
Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::get('admin-profile', [ProfileController::class, 'create'])->middleware('auth')->name('admin-profile');
Route::get('user-profile', [ProfileController::class, 'creates'])->middleware('auth')->name('user-profile');
Route::post('/admin-users', [UserController::class, 'insertAdminUser'])->name('admin-user.store');
Route::post('/isertdoc', [HomeController::class, 'insertDokumen'])->name('insertdoc.store');
Route::post('/isertsej', [HomeController::class, 'insertSejarah'])->name('insertsej.store');
Route::post('/isertbarang', [BarangController::class, 'insertBarang'])->name('insertbarang.store');
Route::post('/iserttran', [TransaksiController::class, 'insertTransaction'])->name('inserttran.store');
Route::post('/transaksi', [TransaksiController::class, 'transaksi'])->name('transaksi');

Route::get('/detail-transaksi/{id}', [TransaksiController::class, 'detailTransaksi'])->name('detail.transaksi');
Route::post('/midtrans-callback', [TransaksiController::class, 'callback'])->name('midtrans.callback')->withoutMiddleware(['web', 'auth']);

Route::post('/updatesej/{id}', [HomeController::class, 'updateSejarah'])->name('updatesej.store');
Route::post('/updatebarang/{id}', [BarangController::class, 'updateBarang'])->name('updatebarang.store');
Route::post('/updatetran/{id}', [TransaksiController::class, 'updateTransaction'])->name('updatetran.store');
Route::post('/cancel/{id}', [TransaksiController::class, 'cancel'])->name('cancel.store');
Route::post('/setuju/{id}', [TransaksiController::class, 'setuju'])->name('setuju.store');
Route::post('/tolak/{id}', [TransaksiController::class, 'tolak'])->name('setuju.store');
Route::post('/updateadm/{id}', [UserController::class, 'updateAdminUser'])->name('updateadm.store');
Route::put('/user-profile/{id}', [UserController::class, 'updateAdminUser'])->name('update-user-profile');
Route::post('/user-profile-photo', [UserController::class, 'updateAdminUserPhoto'])->name('update-user-profile-photo');

Route::delete('/category/{id}', [UserController::class, 'destroy'])->name('nieuws.destroy');
Route::delete('/deletedoc/{id}', [HomeController::class, 'destroydoc'])->name('nieuws.destroydoc');
Route::delete('/deletebarang/{id}', [BarangController::class, 'destroybarang'])->name('nieuws.destroy');
// Route::delete('/deletetrans/{id}', [TransaksiController::class, 'destroytrans'])->name('nieuws.destroytrans');
Route::get('/get-harga/{id}', [TransaksiController::class, 'getHarga']);
Route::post('/logout', [SessionsController::class, 'destroy'])->name('logout');
Route::get('/logouts', [RegisterController::class, 'destroy'])->name('logouts');
Route::get('/', [LandingController::class, 'get'])->name('landingpage');
Route::get('/daftarharga', [LandingController::class, 'getdataharga'])->name('daftarharga');
Route::get('/veriv',  function () {
        return view('Users.veriv');
     })->name('veriv');
     Route::get('/verivikasi/{id}', [LandingController::class, 'create'])->name('verivikasi.create');

Route::get('/check', [LandingController::class, 'check'])->name('Users.harga');
Route::get('/checks', [LandingController::class, 'checks'])->name('Users.history');

// Route::get('/', [LandingController::class, 'create'])->name('veriv');
// Route::get('/detailharga', [LandingController::class, 'getdetailharga'])->name('detailharga');
Route::get('/sejarah', [LandingController::class, 'sejarah'])->name('sejarah');



Route::get('/try', function () {
    return view('Users.pembayaran');
})->name('try');
Route::get('/reset', function () {
    return view('sessions.password.reset');
})->name('reset');
Route::get('/detailharga/{id}', [LandingController::class, 'detailharga'])->name('Users.detailharga');


