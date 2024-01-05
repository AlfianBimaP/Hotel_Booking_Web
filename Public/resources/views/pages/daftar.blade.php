<!-- View untuk menampilkan daftar transaksi -->

@extends('dashboard.layouts.master')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Kamar</h1>
</div>
<div class="table-responsive col-lg-8">
  <a href="/dashboard/post/create" class="btn btn-primary mb-3">Tambah Kamar</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">booking_id</th>
              <th scope="col">full_name</th>
              <th scope="col">room_type</th>
              <th scope="col">check_in</th>
              <th scope="col">check_out</th>
              <th scope="col">phone_number</th>
              <th scope="col">email</th>
              <th scope="col">message</th>
              <th scope="col">action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($booking as $kamar)
            <tr>
              <td>{{$kamar->id}}</td>
              <td>{{$kamar->full_name}}</td>
              <td>{{$kamar->room_type}}</td>
              <td>{{$kamar->check_in}}</td>
              <td>{{$kamar->check_out}}</td>
              <td>{{$kamar->phone_number}}</td>
              <td>{{$kamar->email}}</td>
              <td>{{$kamar->message}}</td>
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

@stop
