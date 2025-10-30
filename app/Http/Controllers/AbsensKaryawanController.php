<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absensKaryawan; // Pastikan ini di-import
use App\Models\KaryawanModel; // Pastikan ini di-import

class AbsensKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensi = absensKaryawan::with('karyawan')->latest()->get(); // 'latest()' untuk mengurutkan
        return view('absenskaryawan.index', compact('absensi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawan = KaryawanModel::all(); 
        return view('absenskaryawan.create', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // 1. Validasi input dari form
        $request->validate([
            'karyawan_id' => 'required|exists:karyawan,id',
            'tanggal' => 'required|date',
            'jam_masuk' => 'required',
            'status' => 'required|in:hadir,sakit,izin,alpha',
            'keterangan' => 'nullable|string', // Boleh kosong
        ]);

        // 2. Jika validasi lolos, simpan data ke database
        absensKaryawan::create($request->all());

        // 3. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('absensi.index')
                         ->with('success', 'Data absensi baru berhasil disimpan.');
    }

    // ... (Fungsi show biarkan kosong untuk saat ini) ...
    public function show(string $id)
    {
        // 1. Cari data absensi (bukan karyawan)
        $absensi = absensKaryawan::with('karyawan')->find($id);

        // 2. Jika tidak ketemu, kembali
        if (!$absensi) {
            return redirect()->route('absensi.index')->with('error', 'Data absensi tidak ditemukan.');
        }

        // 3. Tampilkan view 'absenskaryawan.detail' (bukan karyawan.detail)
        return view('absenskaryawan.detail', compact('absensi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // 1. Cari data absensi berdasarkan ID
        $absensi = absensKaryawan::find($id);

        // Jika data tidak ditemukan, kembali ke index
        if (!$absensi) {
            return redirect()->route('absensi.index')->with('error', 'Data absensi tidak ditemukan.');
        }

        // 2. Ambil semua data karyawan untuk dropdown
        $karyawan = KaryawanModel::all();

        // 3. Tampilkan view edit dan kirim data absensi + data karyawan
        return view('absenskaryawan.edit', compact('absensi', 'karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 1. Validasi input
        $request->validate([
            'karyawan_id' => 'required|exists:karyawan,id',
            'tanggal' => 'required|date',
            'jam_masuk' => 'required',
            'status' => 'required|in:hadir,sakit,izin,alpha',
            'keterangan' => 'nullable|string',
        ]);

        // 2. Cari data absensi berdasarkan ID
        $absensi = absensKaryawan::find($id);
        
        if (!$absensi) {
            return redirect()->route('absensi.index')->with('error', 'Data absensi tidak ditemukan.');
        }

        // 3. Update data di database
        $absensi->update($request->all());

        // 4. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('absensi.index')
                         ->with('success', 'Data absensi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // 1. Cari data absensi berdasarkan ID
        $absensi = absensKaryawan::find($id);

        if (!$absensi) {
            return redirect()->route('absensi.index')->with('error', 'Data absensi tidak ditemukan.');
        }

        // 2. Hapus data
        $absensi->delete();

        // 3. Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('absensi.index')
                         ->with('success', 'Data absensi berhasil dihapus.');
    }
}