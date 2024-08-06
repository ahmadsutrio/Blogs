@extends('admin.app')
@push('styles.admin')
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.css" />
@endpush
@section('admin.content')
    <form class="row g-3 mx-lg-3" method="post" action="{{ route('admin.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="inputTitle" class="form-label">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" id="inputTitle">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="inputTitle" class="form-label">Status</label>
            <select class="form-select @error('status') is-invalid @enderror" name="status" aria-label="Default select example" >
                <option selected hidden readonly>-- Status --</option>
                <option value="private" {{ old('status') == 'private' ? 'selected' : '' }}>Private</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
            </select>
             @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="formFile" class="form-label">Foto Utama</label>
            <input class="form-control @error('foto') is-invalid @enderror" type="file" name="foto" id="formFile" value="{{ old('foto') }}">
             @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="date" class="form-label">Kategori</label>
            <select class="form-select @error('id_kategori') is-invalid @enderror" name="id_kategori" aria-label="Default select example">
                <option selected hidden readonly>-- Kategori --</option>
                @foreach ($getKategori as $item)
                    <option value="{{ $item->id }}"  {{ old('id_kategori') == $item->id ? 'selected' : '' }}>{{ $item->kategori }}</option>
                @endforeach
            </select>
             @error('id_kategori')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputContent" class="form-label">Content</label>
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" id="inputContent" cols="30" rows="10" >{{ old('content') }}</textarea>
             @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="col-12">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection
@push('scripts.admin')
    <script type="importmap">
          {
              "imports": {
                  "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.js",
                  "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.2/"
              }
          }
      </script>

    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Font,
            Paragraph,
            List,
            ListProperties
        } from 'ckeditor5';

        ClassicEditor
            .create(document.querySelector('#inputContent'), {
                plugins: [Essentials, Bold, Italic, Font, Paragraph, List, ListProperties],
                htmlSupport: {
                    allow: [{
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }]
                },
                toolbar: {
                    items: [
                        'undo', 'redo', '|', 'bold', 'italic', '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'bulletedList', 'numberedList'
                    ]
                },
                list: {
                    properties: {
                        styles: true,
                        startIndex: true,
                        reversed: true
                    }
                }
            })
            .then(editor => {
                console.log('Editor berhasil diinisialisasi', editor);
            })
            .catch(error => {
                console.error('Ada masalah dalam menginisialisasi editor.', error);
            });
    </script>
@endpush
