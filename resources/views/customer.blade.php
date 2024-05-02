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
                        <!-- Iterate through customers data -->
                        @foreach($customer as $customer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $customer->namacustomer }}</td>
                                <td><a href="https://wa.me/{{ $customer->numbercustomer }}" target="_blank">{{ $customer->numbercustomer }}</a></td>
                                <td>{{ $customer->order }}</td>
                                <td>{{ $customer->qty }}</td>
                                <td>{{ $customer->total }}</td>
                                <td>
                                    <a href="detailcustomer.php?id={{ $customer->idcustomer }}" class="btn btn-info">View</a>
                                    <button type="button" class="btn btn-primary editBtn" data-toggle="modal" data-target="#edit" data-id="{{ $customer->idcustomer }}" data-name="{{ $customer->namacustomer }}" data-number="{{ $customer->numbercustomer }}" data-email="{{ $customer->emailcustomer }}">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger deleteBtn" data-toggle="modal" data-target="#hapus" data-id="{{ $customer->idcustomer }}">
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
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="idc" id="edit_idc">
                        <div class="form-group">
                            <label for="namacustomer">Nama Customer:</label>
                            <input type="text" class="form-control" id="namacustomer" name="namacustomer" required>
                        </div>
                        <div class="form-group">
                            <label for="numbercustomer">Nomer Customer:</label>
                            <input type="text" class="form-control" id="numbercustomer" name="numbercustomer">
                        </div>
                        <div class="form-group">
                            <label for="emailcustomer">Email Customer:</label>
                            <input type="email" class="form-control" id="emailcustomer" name="emailcustomer">
                        </div>
                        <button type="submit" class="btn btn-primary" name="editcustomer">Submit</button>
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
                        <p>Apakah Anda yakin ingin menghapus pelanggan ini?</p>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="idc" id="delete_idc">
                        <br>
                        <br>
                        <button type="submit" class="btn btn-danger" name="hapuscustomer">Hapus</button>
                    </div>
                </form>
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
        </div>
    </div>

    <script>
        // Function to set data to edit modal
        $('.editBtn').click(function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var number = $(this).data('number');
            var email = $(this).data('email');
            $('#edit_idc').val(id);
            $('#namacustomer').val(name);
            $('#numbercustomer').val(number);
            $('#emailcustomer').val(email);
        });

        // Function to set data to delete modal
        $('.deleteBtn').click(function() {
            var id = $(this).data('id');
            $('#delete_idc').val(id);
        });
    </script>
@endsection
