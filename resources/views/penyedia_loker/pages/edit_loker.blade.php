@extends('penyedia_loker.layout.template')

@section('title', 'Management Loker')

@section('content')

<h1 class="fs-1 mb-5">Edit Loker</h1>
<form class="d-flex mb-3" method="POST" action="{{ route('penyedia-loker.loker.delete') }}">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger ms-auto">Hapus</button>
</form>  
<form class="form-control row g-2 py-3" method="POST" enctype="multipart/form-data" action={{ route('penyedia-loker.loker.edit.patch') }}>
    @csrf
    @method('patch')

    <x-input-label for="nama_loker" :value="('Nama Loker')"/>
    <x-text-input type="text" class="rounded p-2" name="nama_loker" id="nama_loker"/>
    
    <x-input-label for="deskripsi_loker" :value="('Deskripsi Loker')"/>
    <div id="quilleditloker" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" style="min-height: 30vh;">
    </div>
    <x-text-input type="hidden" name="deskripsi_loker" name="deskripsi_loker"/>
    
    <x-input-label for="alamat_loker" :value="('Alamat Loker')"/>
    <x-text-input type="text" class="rounded p-2" name="alamat_loker" id="alamat_loker"/>

    <x-input-label for="pembuat_loker" :value="('Dibuat Oleh')"/>
    <x-text-input type="text" class="rounded p-2" name="pembuat_loker" id="pembuat_loker"/>
    
    <x-input-label for="kategori_loker" :value="('Kategori')"/>
    <select name="kategori_loker" id="kategori_loker" class="rounded p-2">
        <option value="Kategori 1">Kategori 1</option>
        <option value="Kategori 2">Kategori 2</option>
        <option value="Kategori 3">Kategori 3</option>
    </select>
        
    <div class="d-flex justify-content-center gap-5">
        <button type="submit" class="btn btn-primary p-3" onclick="sendDataEditLoker()">{{ __('Edit') }}</button>
        <button type="reset" class="btn btn-secondary p-3">{{ __('Reset') }}</button>
    </div>
</form>

@endsection