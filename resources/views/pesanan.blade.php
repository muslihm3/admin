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
                                        
                                            <tr>
                                                <td>tanggal</td>
                                                <td>nama</td>
                                                <td>pesanan</td>
                                                <td>outlet</td>
                                                <td>jumlah</td>
                                                <td>'Rp. ' .  berapa</td>
                                                <td>admin </td>
                                                <td>
                                                    <a href="detailcustomer.php?id=" class="btn btn-info">View</a>
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
                                                            <h4 class="modal-title">Edit Pesanan</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                
                                                                <!-- Input untuk jenis pesanan -->
                                                                <div class="form-group">
                                                                    <label for="pesanan">Pesanan:</label>
                                                                    <input type="text" name="pesanan" value="" class="form-control" required>
                                                                </div>

                                                                <!-- Dropdown untuk memilih jenis pesanan -->
                                                                <div class="form-group">
                                                                    <label for="outlet_pesanan">Outlet Pesanan:</label>
                                                                     <select class="form-control" id="outlet_pesanan" name="outlet_pesanan">
                                                                        <option value="Onty 1" >Onty 1</option>
                                                                        <option value="Onty 2" >Onty 2</option>
                                                                    </select>
                                                                </div>

                                                                <!-- Input untuk jumlah pesanan (qty) -->
                                                                <div class="form-group">
                                                                    <label for="qty">Jumlah:</label>
                                                                    <input type="number" name="jumlah" value="" class="form-control" required>
                                                                </div>

                                                                <!-- Input untuk total transaksi -->
                                                                <div class="form-group">
                                                                    <label for="total">Transaksi:</label>
                                                                    <input type="number" name="total" value="" class="form-control" required>
                                                                </div>

                                                                <!-- Input untuk tanggal transaksi -->
                                                                <div class="form-group">
                                                                    <label for="tanggal_transaksi">Tanggal Transaksi:</label>
                                                                    <input type="date" name="tanggal_transaksi" value="" class="form-control" required>
                                                                </div>
                                                                
                                                                <!-- Input untuk Admin -->
                                                                <div class="form-group">
                                                                    <label for="tanggal_transaksi">Admin</label>
                                                                    <input type="text" name="admin" value="" class="form-control" required>
                                                                </div>

                                                                
                                                                <input type="hidden" name="idc" value="">
                                                                <input type="hidden" name="idp" value="">
                                                                <button type="submit" class="btn btn-primary" name="editpesanan"> Submit </button>
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
                                                            <h4 class="modal-title">Hapus Pesanan</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                Apakah yakin untuk menghapus  ?
                                                                <input type="hidden" name="idc" value="">
                                                                <input type="hidden" name="idp" value="">
                                                                <input type="hidden" name="kty" value="">
                                                                <input type="hidden" name="total" value="">
                                                                <br>
                                                                <br>

                                                                <button type="submit" class="btn btn-danger" name="hapuspesanan"> Hapus </button>
                                                            </div>
                                                        </form>


                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        
                                        ?>

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
                    <h4 class="modal-title">Pesanan Masuk</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form method="post">
                    <div class="modal-body">

                        <div class="form-group">
                        <label for="outlet_pesanan">Customer:</label>
                        <select name="customernya" class="form-control">
                            
                        </select>
                        </div>
                        
                        <!-- Input untuk jenis pesanan -->
                        <div class="form-group">
                            <label for="pesanan">Pesanan:</label>
                            <input type="text" name="pesanan" placeholder="Pesanan" class="form-control" required>
                        </div>

                        <!-- Dropdown untuk memilih jenis pesanan -->
                        <div class="form-group">
                            <label for="outlet_pesanan">Outlet Pesanan:</label>
                            <select class="form-control" id="outlet_pesanan" name="outlet_pesanan">
                                <option value="Onty 1">Onty 1</option>
                                <option value="Onty 2">Onty 2</option>
                            </select>
                        </div>

                        <!-- Input untuk jumlah pesanan (qty) -->
                        <div class="form-group">
                            <label for="qty">Jumlah:</label>
                            <input type="number" name="qty" placeholder="Jumlah" class="form-control" required>
                        </div>

                        <!-- Input untuk total transaksi -->
                        <div class="form-group">
                            <label for="total">Transaksi:</label>
                            <input type="number" name="total" placeholder="Transaksi" class="form-control" required>
                        </div>

                        <!-- Input untuk Admin -->
                        <div class="form-group">
                            <label for="tanggal_transaksi">Admin</label>
                            <input type="text" name="admin" placeholder="Admin" class="form-control" required>
                        </div>

                        <!-- Input untuk tanggal transaksi -->
                        <div class="form-group">
                            <label for="tanggal_transaksi">Tanggal Transaksi:</label>
                            <input type="date" name="tanggal_transaksi" placeholder="Tanggal Transaksi" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary" name="pesananmasuk">Submit</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

     <!-- Modal Impor Data -->
    <div class="modal fade" id="importPesanan">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Header Modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Import Data</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Isi Modal -->
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="file" name="file" id="file" accept=".xls, .xlsx" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="importData">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
