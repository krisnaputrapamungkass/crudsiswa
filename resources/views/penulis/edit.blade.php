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
                                <form action="{{ route('penulis.update', $data->id) }}" method="post">
                                    @csrf
                                    {{-- put digunakan untuk fungsi update data --}}
                                    @method('PUT')
                                    <h1>Data Siswa</h1>
                                    <a type="button" href=" {{ route('penulis.index') }} " class="btn btn-info">
                                        Kembali</a>
                                    <br>
                                    <label for="">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $data->nama }}">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control"
                                        value="{{ $data->tanggal_lahir }}">
                                    <label for="">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" value="{{ $data->alamat }}">
                                    <button type="submit" class="btn btn-warning">Edit</button>
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