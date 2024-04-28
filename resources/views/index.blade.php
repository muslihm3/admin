@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1> -->

    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Stock Barang</h1>
        <a href="export.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Export Data</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Tambah Barang
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Deskripsi</th>
                            <th>Stock</th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stocks as $stock)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $stock->namabarang }}</td>
                            <td>{{ $stock->deskripsi }}</td>
                            <td>{{ $stock->stock }}</td>
                            <td>
                                <a href="detail.php?id={{ $stock->id }}" class="btn btn-info">View</a>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{ $stock->id }}">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus{{ $stock->id }}">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Barang</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form method="post">
                    <div class="modal-body">
                        <input type="Text" name="namabarang" placeholder="Nama Barang" class="form-control" required>
                        <br>
                        <input type="Text" name="deskripsi" placeholder="Deskripsi Barang" class="form-control" required>
                        <br>
                        <input type="number" name="stock" placeholder="Stock Barang" class="form-control" required>
                        <br>
                        <button type="submit" class="btn btn-primary" name="addnewbarang"> Submit </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
