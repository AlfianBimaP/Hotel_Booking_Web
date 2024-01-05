@extends('layout.master')
@section('content')

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
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque mattis ligula sed urna congue ultrices. Vivamus ullamcorper, sem quis semper gravida, justo lorem tristique ipsum, a sollicitudin nibh turpis sit amet magna. Maecenas sodales sem odio, aliquam hendrerit dui commodo a. In sodales hendrerit laoreet. Aliquam mauris ipsum, elementum et ante eget, ultricies bibendum odio. Ut pretium, augue vel rutrum consectetur, turpis ante faucibus ipsum, bibendum egestas ligula eros ac leo. Vivamus molestie et purus id pharetra. Nunc pharetra lacus vitae condimentum maximus. Nulla nec dignissim enim, eget laoreet odio. Nam suscipit sem a ex placerat dapibus. Sed hendrerit risus sit amet lobortis consequat.<br>

            Nam elit libero, mollis at augue tincidunt, tristique ultricies purus. Aenean lorem eros, faucibus a bibendum non, tempor eget velit. Suspendisse potenti. Pellentesque in pretium ante. Vestibulum venenatis, nunc a ultrices tempus, turpis ipsum dictum felis, at facilisis ligula purus in risus. Fusce iaculis, lorem sit amet consectetur efficitur, tellus urna dignissim velit, nec imperdiet ante risus ac libero. Quisque ipsum nisi, porta ac consequat eget, tincidunt sit amet lorem. Phasellus eros eros, gravida ullamcorper vehicula mattis, eleifend vitae nisl. Duis eu turpis venenatis, ullamcorper diam at, molestie erat. Donec odio lectus, mollis eget dui et, porttitor ultricies urna. Donec justo risus, mollis ac semper non, laoreet et ipsum.
            </article>
        </div>
    </div>
</div>



@stop