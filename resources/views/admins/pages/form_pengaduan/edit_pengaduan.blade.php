@extends('admins.layout.template')

@section('title', 'PWH | Management Pengaduan')

@section('content')

<h1 class="fs-1 mb-5">Edit Pengaduan</h1>
<form class="d-flex mb-3" method="POST">
</form>  
@if ($errors->any())
    <div>
        <ul class="alert alert-danger list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="form-control row g-2 py-3" method="POST" enctype="multipart/form-data" action={{ route('admin.pengaduan.edit.patch') }}>
    @csrf
    @method('PATCH')

    <x-input-label for="nama" :value="('Nama')"/>
    <x-text-input type="text" class="rounded p-2" name="nama" id="nama"/>
    
    <x-input-label for="isi_pengaduan" :value="('Isi Pengaduan')"/>
    <x-text-input type="text" class="rounded p-2" name="email"/>

    <x-input-label for="tanggal_pengaduan" :value="('Tanggal Pengaduan')"/>
    <x-text-input type="date" class="rounded p-2" name="alamat"/>
    
    <x-input-label for="role" :value="('status')"/>
    <select name="status" id="status_berita" class="rounded p-2">
        <option value="menunggu">Menunggu</option>
        <option value="diteirma">Diterima</option>
        <option value="ditolak">Ditolak</option>
    </select>
    
    <x-input-label for="image_pengaduan" :value="('Image')"/>
    <input type="file" accept=".jpg, .png, .jpeg" class="rounded p-2" name="image_berita" id="image_berita"/>
    
    <div class="d-flex justify-content-center gap-5">
        <button type="submit" class="btn btn-primary p-3">{{ __('Edit') }}</button>
        <button type="reset" class="btn btn-secondary p-3">{{ __('Reset') }}</button>
    </div>
</form>

@endSection