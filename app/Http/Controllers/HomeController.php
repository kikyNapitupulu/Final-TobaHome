<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

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
        if (Auth::user()->role == 'Admin') { // Role Guru
            return view('admin.dashboard');
        } elseif (Auth::user()->role == 'Owner') { // Role Murid
            return view('owner.dashboard');
        } elseif (Auth::user()->role == 'Visitor') { // Role Admin
            return view('visitor.index');
        }
    }

}
