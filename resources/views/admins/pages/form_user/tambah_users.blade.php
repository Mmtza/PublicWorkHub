@extends('admins.layout.template')

@section('title', 'PWH | Management User')

@section('content')

<h1 class="fs-1 mb-5">Tambah User</h1>
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
<form class="form-control row g-2 py-3" method="POST" enctype="multipart/form-data" action={{ route('admin.users.tambah.post') }}>
    @csrf
    @method('POST')

    <x-input-label for="nama" :value="('Nama')"/>
    <x-text-input type="text" class="rounded p-2" name="nama" id="nama"/>
    
    <x-input-label for="email" :value="('Email')"/>
    <x-text-input type="text" class="rounded p-2" name="email" id="email"/>

    <x-input-label for="password" :value="('Password')"/>
    <x-text-input type="password" class="rounded p-2" name="password" id="password"/>

    <x-input-label for="repassword" :value="('Re Password')"/>
    <x-text-input type="password" class="rounded p-2" name="repassword" id="repassword"/>

    <x-input-label for="alamat" :value="('Alamat')"/>
    <x-text-input type="text" class="rounded p-2" name="alamat" id="alamat"/>

    <x-input-label for="tanggal_lahir" :value="('Tanggal Lahir')"/>
    <x-text-input type="date" class="rounded p-2" name="tanggal_lahir" id="tanggal_lahir"/>

    <x-input-label for="deskripsi_diri" :value="('Deskripsi Diri')"/>
    <div id="quilledituser" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" style="min-height: 30vh;">
    </div>
    <x-text-input type="hidden" class="rounded p-2" name="deskripsi_diri" id="deskripsi_diri"/>
    
    <x-input-label for="role" :value="('Role')"/>
    <select name="role" id="role" class="rounded p-2">
        <option value="user">User</option>
        <option value="penulis">Penulis</option>
        <option value="penyedia_loker">Penyedia Loker</option>
        <option value="admin">Admin</option>
    </select>
    
    <x-input-label for="image" :value="('Image')"/>
    <input type="file" accept=".jpg, .png, .jpeg" class="rounded p-2" name="image" id="image"/>
    
    <div class="d-flex justify-content-center gap-5">
        <button type="submit" class="btn btn-primary p-3" onclick="sendDataEditUser()">{{ __('Tambah') }}</button>
        <button type="reset" class="btn btn-secondary p-3">{{ __('Reset') }}</button>
    </div>
</form>

@endSection