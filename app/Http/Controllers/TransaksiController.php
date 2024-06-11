<?php

namespace App\Http\Controllers;

use App\Models\DataHarga as DataHarga;
use App\Models\Transaksi as Trans;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function tabeltrans(Request $request)
    {
        $keyword = $request->input('keyword');

        $transaksiDatas = Trans::join('dataharga', 'transaksi.id_dataharga', '=', 'dataharga.id')
            ->join('users', 'transaksi.users_id', '=', 'users.id')
            ->select(
                'transaksi.id',
                'transaksi.nama_pembeli',
                'dataharga.nama as nama_paket',
                'transaksi.total_harga',
                'transaksi.nohp',
                'transaksi.status',
                'transaksi.jumlah',
                'transaksi.alamat',
                'transaksi.note',
                'transaksi.created_at',
                'transaksi.timestamp',
                'dataharga.nama as dataharga_nama',
                'dataharga.harga as harga',
                'users.name as user_name',
                'users.email'
            )
            ->when($keyword, function ($query) use ($keyword) {
                return $query->where('transaksi.nama_pembeli', 'like', '%' . $keyword . '%')
                    ->orWhere('dataharga.nama', 'like', '%' . $keyword . '%')
                    ->orWhere('transaksi.nohp', 'like', '%' . $keyword . '%')
                    ->orWhere('users.name', 'like', '%' . $keyword . '%')
                    ->orWhere('transaksi.alamat', 'like', '%' . $keyword . '%')
                    ->orWhere('transaksi.status', 'like', '%' . $keyword . '%');
            })->orderBy('transaksi.id', 'desc')
            ->get();

        $users = User::get();
        $datahargas = DataHarga::get();

        return view('pages.pesanan', compact('transaksiDatas', 'users', 'datahargas'));
    }


    public function history(Request $request)
    {
        $keyword = $request->input('keyword');

        // dd($snapToken);
        $userId = Auth::id(); // Ambil user ID dari sesi menggunakan Auth

        $transaksiDatas = Trans::join('dataharga', 'transaksi.id_dataharga', '=', 'dataharga.id')
            ->join('users', 'transaksi.users_id', '=', 'users.id')
            ->select(
                'transaksi.id',
                'transaksi.nama_pembeli',
                'dataharga.nama as nama_paket',
                'transaksi.total_harga',
                'transaksi.nohp',
                'transaksi.status',
                'transaksi.jumlah',
                'transaksi.alamat',
                'transaksi.created_at',
                'transaksi.timestamp',
                'dataharga.nama as dataharga_nama',
                'dataharga.harga as harga',
                'users.name as user_name'
            )
            ->where('transaksi.users_id', $userId)
            ->when($keyword, function ($query, $keyword) {
                return $query->where(function ($query) use ($keyword) {
                    $query->where('transaksi.nama_pembeli', 'LIKE', "%{$keyword}%")
                          ->orWhere('dataharga.nama', 'LIKE', "%{$keyword}%")
                          ->orWhere('transaksi.alamat', 'LIKE', "%{$keyword}%")
                          ->orWhere('transaksi.nohp', 'LIKE', "%{$keyword}%");
                });
            })
            ->orderBy('transaksi.id', 'desc') // Filter berdasarkan user_id
            ->get();

        $users = User::get();
        $datahargas = DataHarga::get();
        $snapToken = $request->session()->get('snapToken');

        return view('Users.history', ['snapToken' => $snapToken], compact('transaksiDatas'));
        // return view('Users.history',['snap_token' => $snapToken], compact('transaksiDatas', 'users', 'datahargas'));
    }

    public function historys(Request $request)
{
    $userId = Auth::id(); // Ambil user ID dari sesi menggunakan Auth
    $keyword = $request->input('keyword');

    $transaksiDatas = Trans::join('dataharga', 'transaksi.id_dataharga', '=', 'dataharga.id')
        ->join('users', 'transaksi.users_id', '=', 'users.id')
        ->select(
            'transaksi.id',
            'transaksi.nama_pembeli',
            'dataharga.nama as nama_paket',
            'transaksi.total_harga',
            'transaksi.nohp',
            'transaksi.status',
            'transaksi.jumlah',
            'transaksi.alamat',
            'transaksi.snaptoken',
            'transaksi.created_at',
            'transaksi.timestamp',
            'dataharga.nama as dataharga_nama',
            'dataharga.harga as harga',
            'users.name as user_name'
        )
        ->where('transaksi.users_id', $userId)
        ->when($keyword, function ($query, $keyword) {
            return $query->where(function ($query) use ($keyword) {
                $query->where('transaksi.nama_pembeli', 'LIKE', "%{$keyword}%")
                      ->orWhere('dataharga.nama', 'LIKE', "%{$keyword}%")
                      ->orWhere('transaksi.alamat', 'LIKE', "%{$keyword}%")
                      ->orWhere('transaksi.nohp', 'LIKE', "%{$keyword}%");
            });
        })
        ->orderBy('transaksi.id', 'desc') // Filter berdasarkan user_id
        ->get();

    $users = User::get();
    $datahargas = DataHarga::get();

    return view('Users.detailhistory', compact('transaksiDatas')); // Perhatikan perubahan di sini
}



    public function detailTransaksi($id)
    {
        $userId = Auth::id(); // Ambil user ID dari sesi menggunakan Auth

        $transaksiDatas = Trans::join('dataharga', 'transaksi.id_dataharga', '=', 'dataharga.id')
            ->join('users', 'transaksi.users_id', '=', 'users.id')
            ->select(
                'transaksi.id',
                'transaksi.nama_pembeli',
                'dataharga.nama as nama_paket',
                'transaksi.total_harga',
                'transaksi.nohp',
                'transaksi.status',
                'transaksi.jumlah',
                'transaksi.alamat',
                'transaksi.snaptoken',
                'transaksi.note',
                'transaksi.created_at',
                'transaksi.timestamp',
                'dataharga.nama as dataharga_nama',
                'dataharga.harga as harga',
                'users.name as user_name'
            )
            ->where('transaksi.id', $id) // Gunakan 'transaksi.id' untuk menghindari ambiguitas
            ->get();


        $transaksiData = Trans::join('dataharga', 'transaksi.id_dataharga', '=', 'dataharga.id')
            ->join('users', 'transaksi.users_id', '=', 'users.id')
            ->select(
                'transaksi.id',
                'transaksi.nama_pembeli',
                'dataharga.nama as nama_paket',
                'transaksi.total_harga',
                'transaksi.nohp',
                'transaksi.status',
                'transaksi.jumlah',
                'transaksi.alamat',
                'transaksi.snaptoken',
                'transaksi.note',
                'transaksi.created_at',
                'dataharga.nama as dataharga_nama',
                'dataharga.harga as harga',
                'users.name as user_name'
            )
            ->where('transaksi.users_id', $userId)
            ->orderBy('transaksi.id', 'desc')// Filter berdasarkan user_id
            ->get();

        $users = User::get();
        $datahargas = DataHarga::get();

        return view('Users.detailhistory', compact('transaksiDatas', 'transaksiData', 'users', 'datahargas'));
    }


    public function insertTransaction(Request $request)
{
    $validatedData = $request->validate([
        'nama_pembeli' => 'required',
        'users_id' => 'required',
        'id_dataharga' => 'required',
        'nohp' => 'required',
        'jumlah' => 'required',
        'total_harga' => 'required',
        'alamat' => 'required',
        'tanggal' => 'required|date', // Pastikan input tanggal valid
    ]);

    // // Mengonversi tanggal dan waktu yang diinputkan menjadi format datetime
    // $createdAt = Carbon::createFromFormat('Y-m-d H:i:s',  . ' 00:00:00');

    // Simpan data transaksi ke dalam tabel
    $transaction = new Trans();
    $transaction->nama_pembeli = $validatedData['nama_pembeli'];
    $transaction->id_dataharga = $validatedData['id_dataharga'];
    $transaction->total_harga = $validatedData['total_harga'];
    $transaction->users_id = $validatedData['users_id'];
    $transaction->nohp = $validatedData['nohp'];
    $transaction->alamat = $validatedData['alamat'];
    $transaction->status = 'Belum';
    $transaction->jumlah = $validatedData['jumlah'];
    $transaction->timestamp = $validatedData['tanggal'];

    $transaction->save();
    dd($transaction);
    return redirect('/pesanan')->with('success', 'Transaksi berhasil disimpan');
}



    public function transaksi(Request $request)
    {

        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required',
            'id_dataharga' => 'required',
            'nohp' => 'required',
            'jumlah' => 'required|integer',
            'alamat' => 'required',
            'tanggal' => 'required|date' // Tambahkan validasi untuk tanggal
        ]);
        // $createdAt = Carbon::createFromFormat('Y-m-d H:i:s', $validatedData['tanggal'] . ' 00:00:00');

        // Ambil data harga berdasarkan ID yang diterima dari formulir
        $dataharga = DataHarga::findOrFail($validatedData['id_dataharga']);

        // Hitung total harga
        $totalHarga = $dataharga->harga * $validatedData['jumlah'];

        // Simpan data transaksi ke dalam tabel
        $transaction = new Trans();
        $transaction->nama_pembeli = $validatedData['nama'];
        $transaction->id_dataharga = $validatedData['id_dataharga'];
        $transaction->total_harga = $totalHarga;
        $transaction->users_id = Auth::id(); // Ambil user ID dari session menggunakan Auth
        $transaction->nohp = $validatedData['nohp'];
        $transaction->alamat = $validatedData['alamat'];
        $transaction->status = 'Belum';
        $transaction->jumlah = $validatedData['jumlah'];
        $transaction->timestamp =  $validatedData['tanggal'].':00';
        $transaction->save();
// dd($transaction);
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $transaction->id, // Gunakan ID transaksi sebagai order_id
                'gross_amount' => $transaction->total_harga,
            ),
            'customer_details' => array(
                'nama_pembeli' => $transaction->nama_pembeli,
                'alamat' =>  $transaction->alamat,
                'nohp' =>  $transaction->nohp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $transaction->snaptoken = $snapToken;
        $transaction->save();
        $data = DataHarga::find($validatedData['id_dataharga']);

        return redirect("/history")->with(compact('snapToken', 'transaction', 'data'));

    }


    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $order = Trans::where('id', $request->order_id)->first();
                if ($order) {
                    $order->update(['status' => 'Selesai']);
                    return response()->json(['status' => 'success'], 200);
                } else {
                    return response()->json(['status' => 'error', 'message' => 'Transaksi tidak ditemukan'], 404);
                }
            }
        }
        return response()->json(['status' => 'error', 'message' => 'Gagal melakukan verifikasi transaksi'], 400);
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
        return view('Users.pemesanan', compact('dataharga'));
    }

    public function updateTransaction(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_pembeli' => 'required',
            'users_id' => 'required',
            'id_dataharga' => 'required',
            'nohp' => 'required',
            'jumlah' => 'required',
            'total_harga' => 'required',
            'alamat' => 'required',
        ]);

        $transaction = Trans::find($id);

        if (!$transaction) {
            return redirect('/pesanan')->with('error', 'Transaksi tidak ditemukan');
        }

        $transaction->nama_pembeli = $validatedData['nama_pembeli'];
        $transaction->id_dataharga = $validatedData['id_dataharga'];
        $transaction->total_harga = $validatedData['total_harga'];
        $transaction->users_id = $validatedData['users_id'];
        $transaction->nohp = $validatedData['nohp'];
        $transaction->alamat = $validatedData['alamat'];
        $transaction->jumlah = $validatedData['jumlah'];

        $transaction->save();

        return redirect('/pesanan')->with('success', 'Transaksi berhasil diperbarui');
    }

    public function cancel(Request $request, $id)
    {
        $validatedData = $request->validate([
            'note' => 'required',
        ]);

        $transaction = Trans::find($id);

        if (!$transaction) {
            return back()->with('error', 'Transaksi tidak ditemukan');
        }

        $transaction->note = $validatedData['note'];
        $transaction->status = "Batal";
        $transaction->save();

        return back()->with('success', 'Transaksi berhasil diperbarui');
    }
    public function tolak(Request $request, $id)
    {
        $validatedData = $request->validate([
            'note' => 'required',
        ]);

        $transaction = Trans::find($id);

        if (!$transaction) {
            return back()->with('error', 'Transaksi tidak ditemukan');
        }

        $transaction->note = $validatedData['note'];
        $transaction->status = "Batal";
        $transaction->save();

        return back()->with('success', 'Transaksi berhasil diperbarui');
    }
    public function setuju($id)
    {
        $transaction = Trans::find($id);

        if (!$transaction) {
            return back()->with('error', 'Transaksi tidak ditemukan');
        }

        $transaction->status = "Setuju";
        $transaction->save();

        return back()->with('success', 'Transaksi berhasil diperbarui');
    }




    public function destroytrans($id)
    {
        $blog = Trans::where('id', $id)->delete();

        return redirect('/pesanan');
    }
    public function getHarga($id)
    {
        $harga = Dataharga::find($id); // Gantilah 'Dataharga' sesuai dengan nama model Anda
        return response()->json(['harga' => $harga->harga]);
    }
}
