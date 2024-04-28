@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Stock Masuk</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Stock Masuk
            </button>
            <br>
            <div class="row mt-4">
                <div class="col">
                    <form method="post" class="form-inline">
                        <input type="date" name="tgl_mulai" class="form-control">
                        <input type="date" name="tgl_selesai" class="form-control ml-3">
                        <button type="submit" name="filter_tgl" class="btn btn-info ml-3">Filter</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Transaksi</th>
                            <th>Penerima</th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stock_masuk as $masuk)
                        <tr>
                            <td>{{ $masuk->tanggal }}</td>
                            <td>{{ $masuk->namabarang }}</td>
                            <td>{{ $masuk->jumlah }}</td>
                            <td>{{ $masuk->transaksi }}</td>
                            <td>{{ $masuk->penerima }}</td>
                            <td>
                                <a href="detail.php?id={{ $masuk->id }}" class="btn btn-info">View</a>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{ $masuk->id }}">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus{{ $masuk->id }}">
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
                    <h4 class="modal-title">Stock Masuk</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <select name="barangnya" class="form-control">
                            <!-- Isi opsi select dengan data barang -->
                        </select>
                        <br>
                        <input type="number" name="qty" placeholder="Jumlah" class="form-control" required>
                        <br>
                        <input type="number" name="total" placeholder="Transaksi" class="form-control" required>
                        <br>
                        <input type="file" name="file" accept="image/*" capture required>
                        <br>
                        <br>
                        <input type="text" name="penerima" placeholder="Penerima Barang" class="form-control" required>
                        <br>
                        <button type="submit" class="btn btn-primary" name="barangmasuk"> Submit </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="edit">
        <!-- Isi modal edit -->
    </div>

    <!-- Hapus Modal -->
    <div class="modal fade" id="hapus">
        <!-- Isi modal hapus -->
    </div>
@endsection
