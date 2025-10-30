@extends('karyawan.layout') {{-- Pastikan layout ini ada --}}

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="card w-100">
            <div class="card-header">
                Edit Absensi Karyawan
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Form ini akan mengirim data ke fungsi update() --}}
                <form method="POST" action="{{ route('absensi.update', $absensi->id) }}" id="myForm">
                    @csrf
                    @method('PUT') {{-- Ini penting untuk method UPDATE --}}
                    
                    <div class="form-group mb-3">
                        <label for="karyawan_id">Nama Karyawan</label>
                        <select name="karyawan_id" class="form-control" id="karyawan_id">
                            <option value="">Pilih Karyawan</option>
                            @foreach ($karyawan as $k)
                                <option value="{{ $k->id }}" {{ $k->id == $absensi->karyawan_id ? 'selected' : '' }}>
                                    {{ $k->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ $absensi->tanggal }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="jam_masuk">Jam Masuk</label>
                        <input type="time" name="jam_masuk" class="form-control" id="jam_masuk" value="{{ $absensi->jam_masuk }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="hadir" {{ $absensi->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
                            <option value="sakit" {{ $absensi->status == 'sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="izin" {{ $absensi->status == 'izin' ? 'selected' : '' }}>Izin</option>
                            <option value="alpha" {{ $absensi->status == 'alpha' ? 'selected' : '' }}>Alpha</option>
                        </select>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" class="form-control" id="keterangan">{{ $absensi->keterangan }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
                    <a class="btn btn-secondary mt-3" href="{{ route('absensi.index') }}">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection