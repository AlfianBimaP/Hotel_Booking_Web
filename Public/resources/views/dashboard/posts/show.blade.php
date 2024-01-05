<!-- View Untuk menampilkan Deskripsi kamar di dashboard admin -->

@extends('dashboard.layouts.master')
@section('container')
<div class="container">
    <div class="row my-3 ">
        <div class="col-lg-8">
            <h1 class="mb-3">{{$post->type}}</h1>

            <a href="/dashboard/post" class="btn btn-success"><span data-feather="arrow-left"></span>Back</a>
            <a href="/dashboard/post/{{$post->id}}/edit" class="btn btn-warning"><span data-feather="edit"></span>Edit</a>
            <!-- <a href="/dashboard/post/{{$post->id}}" class="btn btn-danger"><span data-feather="x-circle"></span>delete</a> -->
            <form action="/dashboard/post/{{$post->id}}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data')"><span data-feather="x-circle"></span>Delete</button>
            </form>

            <img src="{{ asset('storage/' . $post->image)}}" class="img-fluid mt-3 d-block">
            
            <article class="my-3 fs-5">
                {{$post->deskripsi}}
            </article>
        </div>
    </div>
</div>
@endsection