@extends('layout.master')

@section('judul')
List Kategori
@endsection

@section('content')

<a href="/kategori/create" class="btn btn-primary btn-sm mb-3">Tambah</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Kategori</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($category as $key => $value)
            <tr>
                <td>{{$key + 1}}</td>
                <td>{{$value->name}}</td>
                <td>
                    <form action="/kategori/{{$value->id}}" method="POST">
                    @csrf
                        @method('DELETE')
                        <a href="/kategori/{{$value->id}}" class="btn btn-info btn-sm">Detail</a>
                        <a href="/kategori/{{$value->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/kategori/{{$value->id}}" class="btn btn-danger btn-sm" data-confirm-delete="true">Delete</a>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td>Tidak Ada Data</td>
            </tr>
        @endforelse
    </tbody>
  </table>

@endsection