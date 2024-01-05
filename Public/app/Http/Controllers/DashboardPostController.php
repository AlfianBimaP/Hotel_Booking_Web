<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
      $this->authorize('admin');
        return view('dashboard.layouts.post', [
            'post' => post::all()
        ]);
    }

    public function post()
    {

        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required',
            'nomor'=>'required',
            'harga'=>'required',
            'image'=>'image|file|max:1024',
            'deskripsi'=>'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-image');
        }
        

        post::create($validatedData);
        return redirect('/dashboard/post')->with('succes', 'Kamar baru telah ditambahkan!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        return view('dashboard.posts.show', [
            'post' =>  $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        $validatedData = $request->validate([
            'type' => 'required',
            'nomor'=>'required',
            'harga'=>'required',
            'image'=>'image|file|max:1024',
            'deskripsi'=>'required'
        ]);

        
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        post::where('id', $post->id)
            ->update($validatedData);

        return redirect('/dashboard/post')->with('succes', 'Update Berhasil Dilakukan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }

        post::destroy($post->id);
        return redirect('/dashboard/post')->with('succes', 'Kamar telah dihapus!');
    }
}
