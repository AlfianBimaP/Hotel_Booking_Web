<?php

namespace App\Http\Controllers;



use Illuminate\Console\View\Components\Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Illuminate\Contracts\Support\MessageProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginsController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.Login');
    }


    public function auth(Request $request)
    {


        //   dd ($request->all());

        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($data)){
            if(Auth::user()->role == 'admin'){
                return redirect('admin/administrator');
            } elseif(Auth::user()->role == 'customer'){
                return redirect('admin/customer');
            }
          //return redirect('/admin');
        }else{
            return redirect('/Login')->withErrors('Username dan password yang dimasukan tidak sesuai')->withInput();
        }

    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
