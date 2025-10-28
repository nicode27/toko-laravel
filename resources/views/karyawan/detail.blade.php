@extends('karyawan.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail Karyawan
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <b>Nama:</b> {{ $karyawan->nama }}
                    </li>
                    <li class="list-group-item">
                        <b>Tempat Lahir:</b> {{ $karyawan->tmp_lahir }}
                    </li>
                    <li class="list-group-item">
                        <b>Tanggal Lahir:</b> {{ $karyawan->tgl_lahir }}
                    </li>
                    <li class="list-group-item">
                        <b>Alamat:</b> {{ $karyawan->alamat }}
                    </li>
                    <li class="list-group-item">
                        <b>No. HP:</b> {{ $karyawan->no_hp }}
                    </li>
                </ul>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-success" href="{{ route('karyawan.index') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection