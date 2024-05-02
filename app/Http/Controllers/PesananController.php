<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pesanan; // Import model Pesanan
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // Apply auth middleware to all methods in this controller
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::count();
        $pesanan = Pesanan::all(); // Retrieve all pesanan data from the database

        $widget = [
            'users' => $users,
            //...
        ];

        // Send pesanan data to the view
        return view('pesanan', compact('widget', 'pesanan'));
    }

    // Implement other methods such as create, store, edit, update, destroy as needed
}
