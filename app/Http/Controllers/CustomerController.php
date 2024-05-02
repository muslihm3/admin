<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer; // Import model Customer
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // Menerapkan middleware auth untuk semua method dalam controller ini
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::count();
        $customer = Customer::all();

        $widget = [
            'users' => $users,
            //...
        ];

        // Kirim data stock masuk ke view
        return view('customer', compact('widget', 'customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Mengembalikan view form untuk membuat pelanggan baru
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'namacustomer' => 'required',
            'numbercustomer' => 'required',
            'emailcustomer' => 'required|email',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        // Menyimpan data pelanggan baru ke database
        Customer::create($request->all());

        // Mengembalikan redirect ke halaman index dengan pesan sukses
        return redirect()->route('customer.index')->with('success', 'Customer added successfully');
    }

    // Implementasikan method lainnya seperti edit, update, destroy sesuai kebutuhan
}
