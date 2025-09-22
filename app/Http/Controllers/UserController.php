<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        return view('home', compact('foods'));
    }

    public function goFile()
    {
        return view('admin.adminFile');
    }

    public function home()
    {
        if (Auth::id() && Auth::user()->user_type == 'admin') {
            return view('admin.dashboard');
        } elseif (Auth::id() && Auth::user()->user_type == 'user') {
            return view('dashboard');
        }
    }
}
