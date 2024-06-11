<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $adminUserCounts = User::where('level', 'admin')->count();
        $userUserCounts = User::where('level', 'user')->count();

        $today = Carbon::now()->toDateString();

        // Menghitung jumlah pesanan dengan status 'Selesai'
        $jumlahpesanan = Transaksi::where('status', 'Selesai') ->whereDate('created_at', $today)->count();

        // Menghitung total pendapatan dari transaksi dengan status 'Selesai' pada tanggal hari ini
        $pendapatan = Transaksi::where('status', 'Selesai')
                                ->whereDate('created_at', $today)
                                ->sum('total_harga');


        return view('dashboard.index', compact('adminUserCounts', 'userUserCounts', 'jumlahpesanan', 'pendapatan'));
    }


    public function grafikTransaksiPerBulan()
    {
        // Ambil data transaksi per bulan
        $transaksiPerBulan = Transaksi::select(
                DB::raw('MONTH(created_at) as bulan'),
                DB::raw('SUM(total_harga) as total')
            )
            ->groupBy(DB::raw('MONTH(created_at)')) ->where('status', 'selesai')
            ->get();

        // Persiapkan data untuk grafik
        $labels = [];
        $data = [];

        foreach ($transaksiPerBulan as $transaksi) {
            $labels[] = \Carbon\Carbon::create()->month($transaksi->bulan)->format('M');
            $data[] = $transaksi->total;
        }

        // Buat data untuk grafik
        $grafikData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Total Transaksi per Bulan',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1,
                    'data' => $data,
                    'fontColor' => '#ffffff', // Ganti warna tulisan label dataset di sini
                ],
            ],

        ];

        return response()->json($grafikData);
    }




}
