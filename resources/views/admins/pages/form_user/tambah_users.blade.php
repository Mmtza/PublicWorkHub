@extends('admins.layout.template')

@section('title', 'Management User')

@section('content')

<h1 class="fs-1 mb-5">Tambah User</h1>
<form class="d-flex mb-3" method="POST">
</form>  
<form class="form-control row g-2 py-3" method="POST" enctype="multipart/form-data" action={{ route('admin.users.tambah.post') }}>
    @csrf
    @method('POST')

    <x-input-label for="nama" :value="('Nama')"/>
    <x-text-input type="text" class="rounded p-2" name="nama" id="nama"/>
    
    <x-input-label for="email" :value="('Email')"/>
    <x-text-input type="text" class="rounded p-2" name="email"/>

    <x-input-label for="alamat" :value="('Alamat')"/>
    <x-text-input type="text" class="rounded p-2" name="alamat"/>

    <x-input-label for="tanggal_lahir" :value="('Tanggal Lahir')"/>
    <x-text-input type="text" class="rounded p-2" name="tanggal_lahir"/>

    <x-input-label for="deskripsi_diri" :value="('Biodata')"/>
    <x-text-input type="text" class="rounded p-2" name="deskripsi_diri"/>
    
    <x-input-label for="role" :value="('Role')"/>
    <select name="status_berita" id="status_berita" class="rounded p-2">
        <option value="user">User</option>
        <option value="penulis">Penulis</option>
        <option value="penyedia_loker">Penyedia Loker</option>
        <option value="admin">Admin</option>
    </select>
    
    <x-input-label for="image_berita" :value="('Image')"/>
    <input type="file" accept=".jpg, .png, .jpeg" class="rounded p-2" name="image_berita" id="image_berita"/>
    
    <div class="d-flex justify-content-center gap-5">
        <button type="submit" class="btn btn-primary p-3">{{ __('Tambah') }}</button>
        <button type="reset" class="btn btn-secondary p-3">{{ __('Reset') }}</button>
    </div>
</form>

@endSection