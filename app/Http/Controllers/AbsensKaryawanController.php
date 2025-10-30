<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absensKaryawan; // <-- Ini sekarang AMAN

class AbsensKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //fungsi untuk menampilkan semua database absensi
 // KaryawanController.php

public function index()
{
    //fungsi untuk menampilkan semua database absensi
    $absensi = absensKaryawan::with('karyawan')->get();

    // BENAR: Tambahkan ; di akhir dan pindahkan }
    return view('absensiKaryawan.index', compact('absensi'));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
