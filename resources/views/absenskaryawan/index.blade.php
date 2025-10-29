@extends('layout.app')
@section('content')

<div class='container mt-4'>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>

    <table class="table table-border">
        <thead>
            <tr>
                <th>No</th>
            <tr>Nama KAryawan</tr>
            <tr>Tanggal Absensi</tr>
            <tr>Status</tr>
            <tr>Keterangan</tr>
            </tr>
        </thead>
        <tbody>
            @foreach ($absensi as $i->$absen)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>{{ $absen->karyawan->nama ?? 'Tidak di temukan' }}</td>
                    <td>{{ $absen->tanggal }}</td>
                    <td>{{ $ucfirst($absen->status) }}</td>
                    <td>{{ $absen->jam_masuk ?? '-'}}</td>
                    <td>{{ $absen->keterangan ?? '-'}}</td>
                </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">Belum ada data absensi.</td>
            </tr>
            @endforelse
        </tbody>

</div>
    </table>
