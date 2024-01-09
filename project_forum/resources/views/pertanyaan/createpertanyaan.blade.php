@extends('layout.master')

@section('judul')
Tambah Pertanyaan
@endsection

@section('content')

<form action="/pertanyaan" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="exampleFormControlSelect1">Kategori</label>
        <select name="category_id" class="form-control" id="">
            <option value="">--pilih kategori--</option>
            @forelse ($category as $item)
                <option value="{{$item->id}}"> {{$item->name}} </option>
            @empty
                <option value="">Kategori tidak ditemukan</option>
            @endforelse
        </select>
    </div>
    @error('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control">
    </div>
    @error('judul')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group">
        <label>Pertanyaan</label>
        <textarea name="content" class="form-control" cols="30" rows="10"></textarea>
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

@endsection
