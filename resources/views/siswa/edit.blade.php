@extends('siswa.partials.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    <div class="card-body">
                        <form action="{{ route('siswa.update', $data->id) }}" method="post">
                            @csrf
                            {{--PUT digunakan untuk update data--}}
                            @method('PUT')
                            <h1>Data Siswa</h1>
                            <a type="button" href=" {{ route('siswa') }}" class="btn btn-info">Tambah Siswa</a>
                            <br>
                            <label for="">ID Siswa</label>
                            <input type="text" class="form-control" name="id_siswa" value="{{ $data->id_siswa}}">
                            <label for="">Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $data->nama}}">
                            <label for="">Tanggal lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control" value="{{ $data->tgl_lahir}}">
                            <label for="">Umur</label>
                            <input type="text" name="umur" class="form-control" value="{{ $data->umur}}">
                            <button type="submit" class="btn btn-warning mt-2">Edit</button>
                        </form>
                    </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection