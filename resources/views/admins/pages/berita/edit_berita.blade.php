@extends('admins.layout.template')

@section('title', 'Management Berita')

@section('content')

<h1 class="fs-1 mb-5">Edit Berita</h1>
<form class="d-flex mb-3" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger ms-auto">Hapus</button>
</form>  
<form class="form-control row g-2 py-3" method="POST" enctype="multipart/form-data" action={{ route('admin.berita.edit.patch') }}>
    @csrf
    @method('PATCH')

    <x-input-label for="judul_berita" :value="('Judul')"/>
    <x-text-input type="text" class="rounded p-2" name="judul_berita" id="judul_berita"/>
    
    <x-input-label for="isi_berita" :value="('Isi')"/>
    <div id="quilleditberita" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" style="min-height: 30vh;">
    </div>
    <x-text-input type="hidden" name="isi_berita" name="isi_berita"/>
    
    <x-input-label for="status_berita" :value="('Status')"/>
    <select name="status_berita" id="status_berita" class="rounded p-2">
        <option value="Menunggu">Menunggu</option>
        <option value="Aktif">Aktif</option>
        <option value="Tidak Aktif">Tidak Aktif</option>
    </select>
    
    <x-input-label for="pembuat_berita" :value="('Dibuat Oleh')"/>
    <x-text-input type="text" class="rounded p-2" name="pembuat_berita" id="pembuat_berita"/>
    
    <x-input-label for="kategori_berita" :value="('Kategori')"/>
    <select name="kategori_berita" id="kategori_berita" class="rounded p-2">
        <option value="Kategori 1">Kategori 1</option>
        <option value="Kategori 2">Kategori 2</option>
        <option value="Kategori 3">Kategori 3</option>
    </select>
    
    <x-input-label for="image_berita" :value="('Image')"/>
    <input type="file" accept=".jpg, .png, .jpeg" class="rounded p-2" name="image_berita" id="image_berita"/>
    
    <div class="d-flex justify-content-center gap-5">
        <button type="submit" class="btn btn-primary p-3">{{ __('Edit') }}</button>
        <button type="reset" class="btn btn-secondary p-3">{{ __('Reset') }}</button>
    </div>
</form>

@endsection