@extends('layout.master')

@section('judul')
Detail Kategori
@endsection

@section('content')

<h1>{{$category->name}}</h1>

<div class="row">
    @forelse ($category->pertanyaan as $item)
        <div class="col-4">
            <div class="card">
                <img class="card-img-top" src="{{ asset('image/' . $item->gambar) }}" alt="..." height="250px">
                <div class="card-body">
                    <h3>{{ $item->judul }}</h3>
                    <p class="card-text">{{ Str::limit($item->content, 50) }}</p>
                    <a href="{{ route('pertanyaan.show', $item->id) }}" class="btn btn-secondary btn-block btn-sm">More</a>
                </div>
            </div>
        </div>
    @empty
        <h3>Kategori ini tidak ada Pertanyaan</h3>
    @endforelse
</div>



<a href="/kategori" class="btn btn-secondary btn-sm">Kembali</a>

@endsection