@extends('karyawan.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <!-- 1 -->
        <!-- <div class="pull-left mt-2">
            <h2>Laravel CRUD Karyawan</h2>
        </div> -->
        <!-- 2 -->
        <div class="float-left my-2">
            <h2 style="text-align: center;">
                <span class="label label-default">
                    Daftar Karyawan
                </span>
            </h2>
        </div>
        <!-- 3 -->
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('karyawan.create') }}">Input Karyawan Baru</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>No. HP</th>
            <th width="280px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($karyawan as $i => $user)
        <tr>
            <td>{{ $karyawan->firstItem() + $i }}</td>
            <td>{{ $user->nama }}</td>
            <td>{{ $user->tmpt_lahir }}</td>
            <td>{{ $user->tgl_lahir }}</td>
            <td>{{ $user->alamat }}</td>
            <td>{{ $user->no_hp }}</td>
            <td>
                <form action="{{ route('karyawan.destroy', $user->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('karyawan.show', $user->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('karyawan.edit', $user->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="text-center">
    {!! $karyawan->links() !!}
</div>
@endsection