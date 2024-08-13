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
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        @php
                            $no = 1;
                        @endphp
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                         </div>
                        @endif
                        <a type="button" href=" {{  route('buku.create') }} " class="btn btn-info mb-2">
                            Tambah Buku</a>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Tahun Terbit</th>
                                    <th>Penulis</th>
                                    <th>Sampul</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->judul_buku }}</td>
                                            <td>{{ $item->tahun_terbit }} </td>
                                            <td>{{ $item->penulis->nama }} </td>
                                            <td> <img src="{{ asset($item->sampul) }}" width="100px" height="100px" style="border-radius: 0%; width: 80px; height:75px"> </td>
                                            <td>
                                                <form action="{{ route('buku.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('buku.edit', $item->id) }}" type="button"
                                                        class="btn btn-warning">Edit</a>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
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
