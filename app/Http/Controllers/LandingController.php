<?php

namespace App\Http\Controllers;

use App\Models\DataHarga;
use App\Models\Documentation;
use App\Models\Jenis;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function get()
    {
        // Mengambil semua data dokumentasi
        $documentations = Documentation::where('jenis', 'dokumentasi')->orderBy('id', 'desc')->get();

        // Mengambil semua data dari tabel Jenis
        $jenis = Jenis::all();
        $sejarah = Documentation::where('jenis', 'sejarah')->latest()->get();


        // Mencari jumlah terbesar dari kolom jumlah
        $maxJumlah = $jenis->max('jumlah');

        return view('Users.landing', ['documentations' => $documentations, 'maxJumlah' => $maxJumlah, 'jenis' => $jenis, 'sejarah' =>$sejarah]);
    }


    public function sejarah()
{
    $sejarah = Documentation::where('jenis', 'sejarah')->latest()->get();

    return view('Users.landingsejarah', compact('sejarah'));
}

    public function getdataharga()
    {
        $dataharga = DataHarga::orderBy('id', 'desc')->get();
        $jeniss = Jenis::orderBy('id', 'desc')->get();
        return view('Users.harga', compact('dataharga', 'jeniss'));
    }


    public function detailharga($id)
    {
        // Mengambil data harga berdasarkan ID
        $dataharga = DataHarga::find($id);

        // Jika data tidak ditemukan, bisa ditangani dengan redirect atau pesan error
        if (!$dataharga) {
            return redirect()->back()->with('error', 'Data harga tidak ditemukan.');
        }

        // Mengirim data harga ke view detailharga
        return view('Users.detailharga', compact('dataharga'));
    }

    public function create($id, Request $request)
{
    // Mengambil data harga berdasarkan ID
    $dataharga = DataHarga::find($id);

    // Jika data tidak ditemukan, bisa ditangani dengan redirect atau pesan error
    if (!$dataharga) {
        return redirect()->back()->with('error', 'Data harga tidak ditemukan.');
    }

    // Mengambil snap token dari sesi
    $snapToken = $request->session()->get('snap_token');
// dd($snapToken);
    if (Auth::check()) {
        // Mengirim data harga dan snap token ke view pemesanan
        return view('Users.pemesanan', compact('dataharga', 'snapToken'));
    } else {
        // Pengguna belum login, arahkan ke halaman veriv
        return redirect('/veriv');
    }
}

    public function check()
    {

        if (Auth::check()) {
            // Mengirim data harga ke view detailharga
            return redirect('/daftarharga');
        } else {
            // Pengguna belum login, arahkan ke halaman veriv
            return redirect('/veriv');
        }
    }
    public function checks()
    {

        if (Auth::check()) {
            // Mengirim data harga ke view detailharga
            return redirect('/history');
        } else {
            // Pengguna belum login, arahkan ke halaman veriv
            return redirect('/veriv');
        }
    }


    public function grafikTransaksiPerBulan()
{
    // Ambil data transaksi per bulan
    $transaksiPerBulan = Transaksi::select(
            DB::raw('DATE(created_at) as tanggal'),
            DB::raw('COUNT(id) as total')
        )
        ->whereBetween('created_at', [now()->subMonth(), now()]) // Mengambil data satu bulan terakhir
        ->groupBy(DB::raw('DATE(created_at)')) ->where('status', 'selesai')// Mengelompokkan per hari
        ->get();

    // Persiapkan data untuk grafik
    $labels = [];
    $data = [];

    foreach ($transaksiPerBulan as $transaksi) {
        $labels[] = \Carbon\Carbon::parse($transaksi->tanggal)->format('D');
        $data[] = $transaksi->total;
    }

    // Buat data untuk grafik
    $grafikData = [
        'labels' => $labels,
        'datasets' => [
            [
                'backgroundColor' => 'rgba(40, 84, 52, 0.2)',
                'borderColor' => 'rgba(40, 84, 52, 1)',
                'borderWidth' => 3,
                'data' => $data,
                'fontColor' => '#255735', // Ganti warna tulisan label dataset di sini
            ],
        ],

    ];

    return response()->json($grafikData);
}

}
