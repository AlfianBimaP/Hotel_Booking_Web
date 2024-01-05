<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        echo "Halo, selamat datang";
        echo "<h1>" . Auth::user()->name . "</h1>";

        echo "<a href='/logout'>Log Out >>>></a>";
    }

    public function administrator()
    {
        return \redirect('/home');
    }
    
    public function customer()
    {
        return \redirect('/home');
    }
    
    public function sudahLogin(User $User)
    {
        if(Auth::user()->role == 'admin'){
            return view('dashboard.index');
        }else{
            return \redirect('/');
        }
    }

}
