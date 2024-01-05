<!-- View Untuk menampilkan daftar transaksi di dashboard admin -->

@extends('dashboard.layouts.master')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Booking</h1>
</div>

@if(session()->has('succes'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('succes')}}
</div>
@endif

<div class="table-responsive col-lg-8">
  
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">booking_id</th>
              <th scope="col">full_name</th>
              <th scope="col">room_type</th>
              <th scope="col">room_number</th>
              <th scope="col">check_in</th>
              <th scope="col">check_out</th>
              <th scope="col">phone_number</th>
              <th scope="col">email</th>
              <th scope="col">message</th>
              <th scope="col">status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($booking as $kamar)
            <tr>
              <td>{{$kamar->id}}</td>
              <td>{{$kamar->full_name}}</td>
              <td>{{$kamar->type}}</td>
              <td>{{$kamar->room_number}}</td>
              <td>{{$kamar->check_in}}</td>
              <td>{{$kamar->check_out}}</td>
              <td>{{$kamar->phone_number}}</td>
              <td>{{$kamar->email}}</td>
              <td>{{$kamar->message}}</td>
              <td>{{$kamar->status}}</td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
  </div>
      
@endsection