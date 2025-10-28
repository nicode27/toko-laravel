@extends("karyawan.layout")

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card w-100">
            <div class="card-header">
                Edit Data Karyawan
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('karyawan.update', $karyawan->id) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" value="{{ $karyawan->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="tmpt_lahir">Tempat Lahir</label>
                        <input type="text" name="tmpt_lahir" class="form-control" id="tmpt_lahir" aria-describedby="tmpt_lahir" value="{{ $karyawan->tmpt_lahir }}">
                    </div>
                    <div class="form-group">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" aria-describedby="tgl_lahir" value="{{ $karyawan->tgl_lahir }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" value="{{ $karyawan->alamat }}">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No. HP</label>
                        <input type="text" name="no_hp" class="form-control" id="no_hp" aria-describedby="no_hp" value="{{ $karyawan->no_hp }}">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
