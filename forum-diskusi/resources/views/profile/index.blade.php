@extends('layout.master')

@section('judul')
Profile
@endsection

@section('content')

<form action="/profile/{{$detailProfile->id}}" method="POST">
    @csrf
    @method('put')

    <div class="form-group">
        <label>Username</label>
        <input type="text" value="{{$detailProfile->user->username}}" class="form-control" disabled>
      </div>

    <div class="form-group">
      <label>Nama</label>
      <input type="text" name="name" value="{{$detailProfile->name}}" class="form-control">
    </div>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" value="{{$detailProfile->email}}" class="form-control">
      </div>
      @error('email')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="form-group">
        <label>Umur</label>
        <input type="number" name="umur" value="{{$detailProfile->umur}}" class="form-control">
      </div>
      @error('umur')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="form-group">
        <label>Jenis Kelamin</label>
        <input type="text" name="gender" value="{{$detailProfile->gender}}" class="form-control">
      </div>
      @error('gender')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" cols="30" rows="10">{{$detailProfile->alamat}}</textarea>
      </div>
      @error('alamat')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="form-group">
        <label>Bio</label>
        <textarea name="bio" class="form-control" cols="30" rows="10">{{$detailProfile->bio}}</textarea>
      </div>
      @error('bio')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection