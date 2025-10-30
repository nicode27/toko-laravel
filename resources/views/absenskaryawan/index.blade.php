@extends('karyawan.layout') {{-- Pastikan Anda punya layout 'karyawan.layout' --}}
@section('content')
    <div class="container mt-4"> {{-- (Perbaiki typo 'container) --}}

        {{-- Tombol Tambah Data --}}
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-left my-2">
                    <h2>Daftar Absensi Karyawan</h2>
                </div>
                <div class="float-right my-2">
                    <a class="btn btn-success" href="{{ route('absensi.create') }}"> Input Absensi Baru</a>
                </div>
            </div>
        </div>

        {{-- 1. @if SEKARANG DITUTUP DENGAN @endif --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- 2. 'table-border' diubah jadi 'table-bordered' --}}
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    {{-- 3. Struktur <thead> DIPERBAIKI --}}
                    <th width="50px">No</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Jam Masuk</th>
                    <th>Keterangan</th>
                    <th width="280px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- 4. @foreach $i->$absen DIUBAH JADI @forelse ($absensi as $absen) --}}
                @forelse ($absensi as $absen)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $absen->karyawan->nama ?? 'Karyawan Dihapus' }}</td>
                        <td>{{ $absen->tanggal }}</td>
                        <td>{{ ucfirst($absen->status) }}</td> {{-- 5. $ucfirst DIUBAH JADI ucfirst() --}}
                        <td>{{ $absen->jam_masuk ?? '-' }}</td>
                        <td>{{ $absen->keterangan ?? '-' }}</td>
                        <td>
                            {{-- Tombol Aksi dari langkah CRUD kita --}}
                            <form action="{{ route('absensi.destroy', $absen->id) }}" method="POST">

                                {{-- INI TOMBOL BARUNYA --}}
                                <a class="btn btn-info btn-sm" href="{{ route('absensi.show', $absen->id) }}">Show</a>

                                <a class="btn btn-primary btn-sm" href="{{ route('absensi.edit', $absen->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data absensi.</td> {{-- 6. Colspan disesuaikan --}}
                    </tr>
                @endforelse {{-- 7. Ditutup dengan @endforelse --}}
            </tbody>
        </table> {{-- 8. </table> SEBELUM </div> --}}

    </div> {{-- 9. </div> SETELAH </table> --}}
@endsection
