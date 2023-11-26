@extends('penulis.layout.template')

@section('title', 'Management Berita')

@section('content')

<h1 class="fs-1 mb-5">Tambah Berita</h1>
<form class="form-control row g-2 py-3" method="POST" enctype="multipart/form-data" action={{ route('penulis.berita.tambah.post') }}>
    @csrf
    @method('post')

    <x-input-label for="judul_berita" :value="('Judul')"/>
    <x-text-input type="text" class="rounded p-2" name="judul_berita" id="judul_berita" required/>
    
    <x-input-label for="isi_berita" :value="('Isi')"/>
    <div id="quilleditberita" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" style="min-height: 30vh;">
    </div>
    <x-text-input type="hidden" name="isi_berita" id="isi_berita"/>
    
    <x-input-label for="kategori_berita" :value="('Kategori')"/>
    <div class="row mt-2">
        @foreach ( $kategori as $k ) 
            <div class="col-8 col-sm-6 col-md-4 col-lg-2">
                <x-text-input type="checkbox" name="nama_kategori[]" value="{{ $k->nama_kategori }}" id="{{ $k->nama_kategori }}"/>
                <label for="{{ $k->nama_kategori }}">{{ $k->nama_kategori }}</label>
            </div>       
        @endforeach
    </div>

    <x-input-label for="image_berita" :value="('Image')"/>
    <input type="file" accept=".jpg, .png, .jpeg" class="rounded p-2" name="image_berita" id="image_berita"/>
    
    <div class="d-flex justify-content-center gap-5">
        <button type="submit" class="btn btn-primary p-3" onclick="sendDataEditBerita()">{{ __('Tambah') }}</button>
        <button type="reset" class="btn btn-secondary p-3">{{ __('Reset') }}</button>
    </div>
</form>

@endsection