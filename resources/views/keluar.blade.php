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
        <h1 class="h3 mb-2 text-gray-800">Stock Keluar</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- Button to Open the Modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Stock Keluar
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
                                <th>Petugas</th>
                                <th>Setting</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                <tr>
                                    <td>tanggal</td>
                                    <td>namabarang</td>
                                    <td>jumlah</td>
                                    <td>petugas</td>
                                    <td>

                                        <a href="detail.php?id=" class="btn btn-info">View</a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">
                                            Edit
                                        </button>

                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapus">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="edit">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Barang</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <form method="post">
                                                <div class="modal-body">

                                                    <input type="number" name="qty" value="" class="form-control" required>
                                                    <br>
                                                    <input type="Text" name="petugas" value="" class="form-control" required>
                                                    <br>
                                                    <input type="hidden" name="idb" value="">
                                                    <input type="hidden" name="idk" value="">
                                                    <button type="submit" class="btn btn-primary" name="editkeluar"> Submit </button>
                                                </div>
                                            </form>


                                        </div>
                                    </div>
                                </div>

                                <!-- Hapus Modal -->
                                <div class="modal fade" id="hapus">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Hapus Barang</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <form method="post">
                                                <div class="modal-body">
                                                    Apakah yakin untuk menghapus  ?
                                                    <input type="hidden" name="idb" value="">
                                                    <input type="hidden" name="idk" value="">
                                                    <input type="hidden" name="kty" value="">
                                                    <br>
                                                    <br>
                                                    <button type="submit" class="btn btn-danger" name="hapuskeluar"> Hapus </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
                    <h4 class="modal-title">Stock Keluar</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form method="post">
                    <div class="modal-body">

                        <select name="barangnya" class="form-control">
                            
                        </select>
                        <br>

                        <input type="number" name="qty" placeholder="Jumlah" class="form-control" required>
                        <br>
                        <input type="Text" name="petugas" placeholder="Petugas" class="form-control" required>
                        <br>
                        <button type="submit" class="btn btn-primary" name="barangkeluar"> Submit </button>
                    </div>
                </form>
            </div>
@endsection
