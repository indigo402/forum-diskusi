@extends('layout.master')

@section('judul')
Edit Pertanyaan
@endsection

@section('content')

<form action="/pertanyaan/{{$pertanyaan->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
        <label>Kategori</label>
        <select name="category_id" class="form-control">
            <option value="">--pilih kategori--</option>
            @foreach ($category as $item)
            @if ($item->id == $pertanyaan->category_id)
            <option value="{{$item->id}}"> {{$item->name}} </option>
            @else
            <option value="{{$item->id}}"> {{$item->name}} </option>
            @endif
            @endforeach
        </select>
    </div>
    @error('category_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="judul" value="{{$pertanyaan->judul}}" class="form-control">
    </div>
    @error('judul')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Pertanyaan</label>
        <textarea name="content" class="form-control" cols="30" rows="10">{{$pertanyaan->content}}</textarea>
    </div>
    @error('content')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Tanggal</label>
        <input type="date" name="date" class="form-control">
    </div>
    @error('date')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Gambar (Image)</label>
        <input type="file" name="gambar" class="form-control">
    </div>
    @error('gambar')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection