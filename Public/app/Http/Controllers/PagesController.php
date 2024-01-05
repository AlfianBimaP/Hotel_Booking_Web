<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
use App\Models\booking;
use Illuminate\Http\Request;

class PagesController extends Controller
{


    public function home()
    {
        return view('pages.home');   
    }

    public function kamar()
    {
        return view('pages.Daftar_Kamar', [
            'post'=> post::all()
        ]);   
    }

    public function tentang_kami()
    {
        return view('pages.Tentang_Kami');
    }

    public function gallery()
    {
        return view('pages.Gallery');
    }

    public function hubungi_kami()
    {
        return view('pages.Hubungi_Kami');
    }

    public function deskripsi(post $post)
    {
        
        return view('pages.deskripsi', [
            'post' =>  $post
            
            
        ]);

     
    }

    public function invoice()
    {
       
        $booking = booking::all();
              
        return view('booking.Transaksi', [
            'booking' => $booking
        ]);

    }

    public function daftar()
    {
       

        $booking = booking::all();
              
        return view('pages.daftar', [
            'booking' => $booking
        ]);
    }
    


    
}
   
