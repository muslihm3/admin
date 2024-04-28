<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\StockMasuk;
use Illuminate\Http\Request;

class MasukController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $stock_masuk = StockMasuk::all(); // Ambil semua data stock masuk dari model

        $widget = [
            'users' => $users,
            //...
        ];

        // Kirim data stock masuk ke view
        return view('masuk', compact('widget', 'stock_masuk'));
    }
}
