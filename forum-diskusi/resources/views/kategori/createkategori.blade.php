@extends('layout.master')

@section('judul')
Tambah Kategori
@endsection

@section('content')

<form action="/kategori" method="POST">
    @csrf
    <div class="form-group">
      <label>Nama Kategori</label>
      <input type="text" name="name" class="form-control">
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection