@extends('layout.master')

@section('judul')
    Halaman List Pertanyaan
@endsection

@section('content')
    
@auth
<a href="/pertanyaan/create" class="btn btn-primary btn-sm mb-4">Tambah Pertanyaan</a>
@endauth
        <div class="row">
            @forelse ($pertanyaan as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('image/' . $item->gambar) }}" alt="..." height="250px">
                        <div class="card-body">
                            <h3>{{ $item->judul }}</h3>
                            <span class="badge badge-info">{{$item->kategori->name}}</span>
                            <p class="card-text" >{!! Str::limit ($item->content, 50) !!}</p>
                            <a href="{{ route('pertanyaan.show', $item->id) }}" class="btn btn-secondary btn-block btn-sm">More</a>
                            @auth
                            <div class="row my-3">
                                <div class="col">
                                    <a href="{{ route('pertanyaan.edit', $item->id) }}" class="btn btn-warning btn-block btn-sm">Edit</a>
                                </div>
                                <div class="col">
                                    <form action="{{ route('pertanyaan.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('pertanyaan.destroy', $item->id) }}" class="btn btn-danger btn-block btn-sm" data-confirm-delete="true">Delete</a>
                                    </form>
                                </div>
                            </div>
                            @endauth
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <h2 class="text-center">Tidak ada Pertanyaan</h2>
                </div>
            @endforelse
        </div>
    </div>
@endsection
