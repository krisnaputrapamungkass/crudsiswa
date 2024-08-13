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
                        <form action="{{ route('buku.update', $data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h1>Data Buku</h1>
                            <a type="button" href=" {{ route('buku.index') }}" class="btn btn-info">Kembali</a>
                            <br>
                            <label for="">Judul Buku</label>
                            <input type="text"  name="judul_buku" class="form-control" value="{{ $data->judul_buku}}" >
                            <label for="">tahun terbit</label>
                            <input type="date" name="tahun_terbit" class="form-control" value="{{ $data->tahun_terbit}}">
                            <label for="">ISBN</label>
                            <input type="text" name="isbn" class="form-control" value=" {{ $data->isbn }}">
                            <label for=""><b>Penulis</b></label>
                            <select name="id_penulis" id="id_penulis" class="form-control">

                                @foreach ($penulis as $item)
                                <option value="{{ $item->id }}"
                                {{$data->id_penulis == $item->id ? 'selected' : ''}}
                                >

                                    {{ $item->nama }}

                                </option>
                                @endforeach
                            </select>
                            <label for="">Genre</label>
                            <input type="text" class="form-control" name="genre" value="{{ $data->genre}}">
                            <label for="">Tempat terbit</label>
                            <input type="text" name="tempat_terbit" class="form-control" value=" {{ $data->tempat_terbit }}">
                            <label for="">Penerbit</label>
                            <input type="text" name="penerbit" class="form-control" value=" {{ $data->penerbit}}">
                            <label for="">Sampul</label>
                            <br>
                            <img src="{{asset($data->sampul)}}" width="80px" height="85px" alt="">
                            <br>
                            <br>
                            <input type="file" name="sampul" class="form-control" value=" {{ $data->sampul}}">
                            <br>
                            <button type="submit" class="btn btn-warning mt-2">Simpan</button>
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