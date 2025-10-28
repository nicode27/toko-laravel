<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KaryawanModel;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = KaryawanModel::latest()->paginate(5); #paginet dalahn 5 data per halaman
        return view('karyawan.index', compact('karyawan'))
            ->with('i', (request()->input('page', 1) - 1) * 5 );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // form data karyawan
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi data
        $request->validate([
            'nama' => 'required',
            'tmpt_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        // eliquent menambah data
        KaryawanModel::create($request->all());

        //kembali ke halaman index
        return redirect()->route('karyawan.index')
            ->with('success', 'Karyawan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // menampilkan 1 data karyawan dari pencarian id
        $karyawan = KaryawanModel::find($id);
        return view('karyawan.detail', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //menemukan data karyawan berdasarkan id untuk diedit
        $karyawan = KaryawanModel::find($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validasi data
        $request->validate([
            'nama' => 'required',
            'tmpt_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);
        // eloquent mengupdate data karyawan
        $karyawan = KaryawanModel::find($id);
        $karyawan->update($request->all());

        // kembali ke halaman index
        return redirect()->route('karyawan.index')
            ->with('success', 'Karyawan Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //eloquent menghapus data
        KaryawanModel::find($id)->delete();
        return redirect()->route('karyawan.index')
            ->with('success', 'Karyawan Berhasil Dihapus');
    }
}