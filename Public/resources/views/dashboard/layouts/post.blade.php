<!-- View Untuk Menampilkan daftar kamar di dashboard admin -->

@extends('dashboard.layouts.master')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Kamar</h1>
</div>

@if(session()->has('succes'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('succes')}}
</div>
@endif

<div class="table-responsive col-lg-8">
  <a href="/dashboard/post/create" class="btn btn-primary mb-3">Tambah Kamar</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Type</th>
              <th scope="col">No.Kamar</th>
              <th scope="col">Harga</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($post as $kamar)
            <tr>
              <td>{{ $loop->iteration}}</td>
              <td>{{$kamar->type}}</td>
              <td>{{$kamar->nomor}}</td>
              <td>{{$kamar->harga}}</td>
              <td>
                <a href="/dashboard/post/{{$kamar->id}}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/dashboard/post/{{$kamar->id}}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/post/{{$kamar->id}}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Apakah anda yakin akan menghapus data')"><span data-feather="x-circle"></span></button>
                </form>
              </td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
  </div>
      
@endsection