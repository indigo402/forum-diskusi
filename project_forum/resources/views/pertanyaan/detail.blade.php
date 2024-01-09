@extends('layout.master')

@section('judul')
Halaman Pertanyaan
@endsection

@section('content')
<img class="card-img-top" src="{{ asset('image/' . $pertanyaan->gambar) }}" alt="...">
<h3>{{ $pertanyaan->judul }}</h3>
<p class="card-text">{!! $pertanyaan->content !!}</p>

<hr>

<h4>List Jawaban</h4>
@forelse ($pertanyaan->jawaban as $item)
<div id="accordion">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                    aria-controls="collapseOne">
                    Jawaban dari {{$item->user->username}}
                </button>

            </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                {!! $item->content !!}
                <form action="/jawaban/{{$item->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/jawaban/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
            </div>

        </div>
    </div>

    @empty
    <h4>Belum ada Jawaban</h4>
    @endforelse

    <br><br>
    <h3>Isi Jawabanmu </h3>
    <form action="/jawaban/{{ $pertanyaan->id }}" method="post"> <!-- Corrected the form opening tag -->
        @csrf
        <textarea name="content" cols="30" class="form-control my-3" placeholder="Isi Jawaban" rows="10"></textarea>
        @error('content')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <br>
        <input type="submit" class="btn btn-primary btn-block btn-sm" value="Jawab">
    </form> <!-- Corrected the form closing tag -->
    @push('scripts')
    <script src="https://cdn.tiny.cloud/1/uyhg8uh495t7usovbokf6xfv85apks9g0nlkrma2ov65ecda/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
    });
</script>

    @endpush
    <hr><br>
    <a href="/pertanyaan" class="btn btn-secondary btn-block btn-sm">Kembali</a>
    @endsection