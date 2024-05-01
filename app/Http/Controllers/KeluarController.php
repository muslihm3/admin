<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\StockKeluar; // tambahkan ini untuk mengimpor model StockKeluar
use Illuminate\Http\Request;

class KeluarController extends Controller
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
        $stock_keluar = StockKeluar::all(); // Ambil semua data stock keluar dari model

        $widget = [
            'users' => $users,
            //...
        ];

        // Kirim data stock keluar ke view
        return view('keluar', compact('widget', 'stock_keluar'));
    }
}
