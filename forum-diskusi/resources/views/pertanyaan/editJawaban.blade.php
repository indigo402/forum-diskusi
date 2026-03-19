@extends('layout.master')

@section('judul')
Edit Jawaban
@endsection

@section('content')
<form action="/jawaban/{{$jawaban->id}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
        <label>Isi Jawaban</label>
        <textarea  name="content" class="form-control" cols="30" rows="10">{{$jawaban->content}}"</textarea>
    </div>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <button type="submit" class="btn btn-warning">Update</button>
</form>
@endsection