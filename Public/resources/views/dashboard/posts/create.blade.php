@extends('dashboard.layouts.master')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambahkan Kamar</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/post" enctype="multipart/form-data">
        @csrf
      <div class="mb-3">
        <label for="type" class="form-label"><b>Tipe Kamar</b></label>
        <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" value="{{ old('type') }}">
        @error('type')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nomor" class="form-label"><b>Nomor Kamar</b></label>
        <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor" name="nomor" value="{{ old('nomor') }}">
        @error('nomor')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="harga" class="form-label"><b>Harga Kamar</b></label>
        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') }}">
        @error('harga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="image" class="form-label"><b>Masukkan Gambar</b></label>
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input class="form-control  @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
        @error('image')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
        @enderror
      </div>
      <!-- <div class="mb-3">
        <label for="deskripsi" class="form-label"><b>Deskripsi</b></label>
        <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi') }}">
        <trix-editor input="deskripsi"></trix-editor>
        @error('deskripsi')
            <p class="text-danger">{{$message}}</p>
        @enderror
      </div> -->
      <div class="mb-3">
        <label for="deskripsi" class="form-label"><b>Deskripsi</b></label>
        <input type="text" class="form-control @error('harga') is-invalid @enderror" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}">
        @error('deskripsi')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection