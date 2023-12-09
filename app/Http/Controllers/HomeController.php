<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
        $user = auth()->user();
        if ($user->role == 'client') {
            return redirect()->route('client.home');
        } elseif ($user->role == 'kasir') {
            return redirect()->route('order.index');
        } elseif ($user->role == 'manager') {
            return redirect()->route('manager.index');
        }
    }
}
