{{-- Anda mungkin lupa @extends('layout.app') dan @section('content')
     Jika Anda punya file layout, pastikan nama filenya benar.
     Saya akan asumsikan Anda punya layout. --}}
@extends('karyawan.layout') {{-- Menggunakan layout karyawan yang sudah ada --}}
@section('content')

<div class='container mt-4'>
    
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="float-left my-2">
                <h2>Daftar Absensi Karyawan</h2>
            </div>
            <div class="float-right my-2">
                {{-- Arahkan ke route untuk menambah absensi baru --}}
                <a class="btn btn-success" href="{{ route('absensi.create') }}"> Input Absensi Baru</a>
            </div>
        </div>
    </div>

    @if(session('success'))
        {{-- class="alert alert-success" salah ketik --}}
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif {{-- Lupa @endif --}}

    <table class="table table-bordered"> {{-- 'table-border' seharusnya 'table-bordered' --}}
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Karyawan</th> {{-- '<tr>' tidak boleh di dalam '<tr>' --}}
                <th>Tanggal Absensi</th> {{-- '<tr>' tidak boleh di dalam '<tr>' --}}
                <th>Status</th>
                <th>Jam Masuk</th> {{-- Tambahkan ini --}}
                <th>Keterangan</th> {{-- '<tr>' tidak boleh di dalam '<tr>' --}}
            </tr>
        </thead>
        <tbody>
            {{-- Sintaks @foreach salah, harusnya ($absensi as $i => $absen) atau ($absensi as $absen) --}}
            {{-- Kita gunakan @forelse untuk menangani jika data kosong --}}
            @forelse ($absensi as $absen)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $absen->karyawan->nama ?? 'Tidak ditemukan' }}</td>
                    <td>{{ $absen->tanggal }}</td>
                    <td>{{ ucfirst($absen->status) }}</td> {{-- ucfirst() adalah fungsi PHP, tidak perlu '$' --}}
                    <td>{{ $absen->jam_masuk ?? '-'}}</td>
                    <td>{{ $absen->keterangan ?? '-'}}</td>
                </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Belum ada data absensi.</td> {{-- colspan="6" --}}
            </tr>
            @endforelse
        </tbody>
    </table> {{-- Lupa penutup </table> --}}

</div>

@endsection {{-- Lupa penutup @endsection --}}