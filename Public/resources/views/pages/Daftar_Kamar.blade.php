@extends('layout.master')
@section('content')
      <div class="back_re">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2>Daftar Kamar</h2>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- our_room -->
      <div  class="our_room">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <p  class="margin_0">(Your Hotel)</p>
                  </div>
               </div>
            </div>
            <div class="row">
               @foreach ($post as $kamar)
               <div class="col-md-4 col-sm-6">
                  <div id="serv_hover"  class="room">
                     <div class="room_img">
                        <figure><img src="{{ asset('storage/' . $kamar->image) }}" alt="error"></figure>
                     </div>
                     <div class="bed_room">
                        <h3>{{$kamar->type}}</h3>
                        <p>{{$kamar->deskripsi}}</p>

                        <a href="/booking" class="btn btn-primary">Booking</a>
                        <!-- <a href="/deskripsi/{{$kamar->id}}" class="btn btn-info"><span data-feather="arrow-left"></span>Read More</a> -->
                        
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
      <!-- end our_room -->


@stop