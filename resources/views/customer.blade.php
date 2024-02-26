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
        <h1 class="h3 mb-0 text-gray-800">Customer Onty</h1>
        <a href="export.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Export Data</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Tambah Customer
            </button>

            <!-- Button to Open the Import Modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#importModal">
                Import Data
            </button>
        </div>
        <br>
        <div class="row mt-2">
            <div class="col">
                <form method="POST" class="form-inline">
                        <input type="number" id="minTotalOrder" name="minTotalOrder" class="form-control ml-3" min="0" placeholder="Minimum Total Order" />
                        <input  id="searchCustomer" name="searchCustomer" class="form-control ml-3" placeholder="Search Customer" />
                    <button type="submit" id="filterBtn" class="btn btn-info ml-3">Filter</button>
                </form>
            </div>
        </div>
        

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Customer</th>
                            <th>Nomer</th>
                            <th>Total Order</th>
                            <th>Total Pesanan</th>
                            <th>Total Transaksi</th>
                            <th>Setting</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td><a href="https://wa.me/" target="_blank"></a></td>
                                <td>total . ' Kali'</td>
                                <td>total</td>
                                <td>'Rp. ' .  total</td>
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
                                            <h4 class="modal-title">Edit Customer</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <form method="post">
                                            <div class="modal-body">
                                                <input type="Text" name="namacustomer" value="" class="form-control" required>
                                                <br>
                                                <input type="number" name="numbercustomer" value="" class="form-control">
                                                <br>
                                                <input type="Email" name="emailcustomer" value="" class="form-control">
                                                <br>

                                                <input type="hidden" name="idc" value="">
                                                <button type="submit" class="btn btn-primary" name="editcustomer"> Submit </button>
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
                                            <h4 class="modal-title">Hapus Customer</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <form method="post">
                                            <div class="modal-body">
                                                Apakah yakin untuk menghapus  ?
                                                <input type="hidden" name="idc" value="">
                                                <br>
                                                <br>

                                                <button type="submit" class="btn btn-danger" name="hapuscustomer"> Hapus </button>
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
    <h4 class="modal-title">Tambah Customer</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>

<!-- Modal body -->
<form method="post">
    <div class="modal-body">
        <input type="text" name="namacustomer" placeholder="Nama Customer" class="form-control" required>
        <br>
        <input type="number" name="numbercustomer" placeholder="Nomer Customer" class="form-control">
        <br>
        <input type="Email" name="emailcustomer" placeholder="Email Customer" class="form-control">
        <br>

        <button type="submit" class="btn btn-primary" name="addnewCustomer"> Submit </button>
    </div>
</form>




</div>
</div>
</div>

<!-- Modal Impor Data -->
<div class="modal fade" id="importModal">
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
@endsection
