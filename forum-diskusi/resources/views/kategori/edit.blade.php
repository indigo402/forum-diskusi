@extends('layout.master')

@section('judul')
Edit Kategori
@endsection

@section('content')
<form action="/kategori/{{$category->id}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
      <label>Nama Kategori</label>
      <input type="text" name="name" value="{{$category->name}}" class="form-control">
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-warning">Update</button>
  </form>
@endsection