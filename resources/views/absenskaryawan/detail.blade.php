@extends('karyawan.layout') {{-- Menggunakan layout yang sama --}}

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail Absensi Karyawan
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <b>Nama:</b> {{ $absensi->karyawan->nama ?? 'N/A' }}
                    </li>
                    <li class="list-group-item">
                        <b>Tanggal:</b> {{ \Carbon\Carbon::parse($absensi->tanggal)->format('d F Y') }}
                    </li>
                    <li class="list-group-item">
                        <b>Jam Masuk:</b> {{ $absensi->jam_masuk }}
                    </li>
                    <li class="list-group-item">
                        <b>Status:</b> {{ ucfirst($absensi->status) }}
                    </li>
                    <li class="list-group-item">
                        <b>Keterangan:</b> {{ $absensi->keterangan ?? '-' }}
                    </li>
                </ul>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-success" href="{{ route('absensi.index') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection