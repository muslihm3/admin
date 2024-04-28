<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stock; 
use Illuminate\Http\Request;

class IndexController extends Controller
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
        $stocks = Stock::all();

        return view('index', compact('users', 'stocks'));
    }
}
