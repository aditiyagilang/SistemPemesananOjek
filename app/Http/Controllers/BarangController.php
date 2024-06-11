<?php

namespace App\Http\Controllers;

use App\Models\DataHarga as DataHarga;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jenis;

class BarangController extends Controller
{
//     public function tabelbarang()
// {
//     $datahargas = DataHarga::orderBy('id', 'desc')->get();
//     $jeniss = Jenis::orderBy('id', 'desc')->get();
//     return view('pages.barang', compact('datahargas', 'jeniss'));
// }
public function tabelbarang(Request $request)
{
    $keyword = $request->input('keyword');

    $datahargas = DataHarga::orderBy('id', 'desc')
        ->when($keyword, function ($query) use ($keyword) {
            return $query->where('nama', 'like', '%' . $keyword . '%')
                ->orWhere('deskripsi', 'like', '%' . $keyword . '%');
        })
        ->get();

    $jeniss = Jenis::orderBy('id', 'desc')->get();

    return view('pages.barang', compact('datahargas', 'jeniss'));
}

    public function destroybarang($id)
    {
        $blog = DataHarga::where('id', $id)->delete();

        return redirect('/barang');
    }

    public function insertBarang(Request $request)
{
    $validatedData = $request->validate([
        'id_jenis' => 'required',
        'nama' => 'required',
        'durasi' => 'required',
        'deskripsi' => 'required',
        'harga' => 'required',
        'gambar' => 'nullable',
    ]);

    // Hapus titik dari input harga
    $harga = str_replace('.', '', $validatedData['harga']);

    $files = $request->file('gambar');
    $fileName = time() . '.' . $files[0]->getClientOriginalName();
    $filePath = 'assets/img/dokumentation';
    $files[0]->move(public_path($filePath), $fileName); // Pindahkan file ke direktori yang ditentukan

    // Simpan jalur file dalam database
    $photoPath = $filePath . '/' . $fileName; // Perbarui jalur foto

    // Buat catatan baru
    $bill = new DataHarga();
    $bill->id_jenis = $validatedData['id_jenis'];
    $bill->nama = $validatedData['nama'];
    $bill->durasi = $validatedData['durasi'];
    $bill->deskripsi = $validatedData['deskripsi'];
    $bill->harga = $harga; // Simpan harga yang telah dimodifikasi
    $bill->gambar = $fileName; // Simpan jalur file dalam database
    $bill->save();

    // Redirect atau kembalikan respons sesuai kebutuhan
    return redirect('/barang')->with('success', 'Admin user created successfully');
}


    public function updateBarang(Request $request, $id)
{
    $validatedData = $request->validate([
        'id_jenis' => 'required',
        'nama' => 'required',
        'durasi' => 'required',
        'deskripsi' => 'required',
        'harga' => 'required',
        'gambar' => 'nullable',

    ]);

    // Cari data billing yang akan diperbarui berdasarkan ID
    $bill = DataHarga::find($id);

    if (!$bill) {
        // Handle the case where the data with the given ID is not found
        return redirect('/barang')->with('error', 'Data not found');
    }

    // Menghandle gambar hanya jika ada file yang diunggah
    if ($request->hasFile('gambar')) {
        $files = $request->file('gambar');
        $fileName = time() . '.' . $files[0]->getClientOriginalName();
        $filePath = 'assets/img/dokumentation';
        $files[0]->move(public_path($filePath), $fileName); // Move the file to the specified directory

        // Save the file path in the database
        $photoPath = $filePath . '/' . $fileName; // Update the photo path

        // Save the file path in the database
        $bill->gambar = $filePath . '/' . $fileName;
    }

    // Update data hanya jika ada data yang diberikan
    $bill->id_jenis = $validatedData['id_jenis'] ?? $bill->id_jenis;
    $bill->nama = $validatedData['nama'] ?? $bill->nama;
    $bill->durasi = $validatedData['durasi'] ?? $bill->durasi;
    $bill->deskripsi = $validatedData['deskripsi'] ?? $bill->deskripsi;
    $bill->harga = $validatedData['harga'] ?? $bill->harga;
    $bill->gambar = $fileName ?? $bill->gambar;

    $bill->save();

    return redirect('/barang')->with('success', 'Data updated successfully');
}

}
