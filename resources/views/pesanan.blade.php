@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pesanan Masuk</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Pesanan Masuk
            </button>

            <!-- Button to Open the Import Modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#importModal">
                Import Data
            </button>
            <br>
            <div class="row mt-4">
                <div class="col">
                    <form method="post" class="form-inline">
                        <input type="date" name="tgl_mulai" class="form-control">
                        <input type="date" name="tgl_selesai" class="form-control ml-3">
                        <input  id="searchPesanan" name="searchPesanan" class="form-control ml-3" placeholder="Search Pesanan" />
                        <button type="submit" name="filter" class="btn btn-info ml-3">Filter</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal Transaksi</th>
                            <th>Nama Customer</th>
                            <th>Pesanan</th>
                            <th>Outlet</th>
                            <th>Jumlah</th>
                            <th>Transaksi</th>
                            <th>Admin</th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Iterate through pesanan data -->
                        @foreach($pesanan as $item)
                            <tr>
                                <td>{{ $item->tanggal_transaksi }}</td>
                                <td>{{ $item->customer->namacustomer }}</td>
                                <td>{{ $item->pesanan }}</td>
                                <td>{{ $item->outlet }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>{{ 'Rp. ' . $item->transaksi }}</td>
                                <td>{{ $item->admin }}</td>
                                <td>
                                    <a href="#" class="btn btn-info">View</a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{ $item->id }}">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus{{ $item->id }}">
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="edit{{ $item->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Pesanan</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <form method="post">
                                            <div class="modal-body">
                                                <!-- Form fields to edit pesanan -->
                                                <!-- Example: -->
                                                <input type="text" name="pesanan" value="{{ $item->pesanan }}" class="form-control" required>
                                                <!-- Add other fields as needed -->
                                                <button type="submit" class="btn btn-primary" name="editpesanan">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Hapus Modal -->
                            <div class="modal fade" id="hapus{{ $item->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Hapus Pesanan</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <form method="post">
                                            <div class="modal-body">
                                                <!-- Confirmation message -->
                                                <p>Apakah Anda yakin ingin menghapus pesanan ini?</p>
                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <!-- Add other hidden fields if needed -->
                                                <button type="submit" class="btn btn-danger" name="hapuspesanan">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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
        <!-- Modal content -->
        <!-- Your modal content goes here -->
    </div>

    <!-- Modal Impor Data -->
    <div class="modal fade" id="importModal">
        <!-- Modal content -->
        <!-- Your import modal content goes here -->
    </div>
@endsection
