@extends('admins.layout.template')

@section('title', 'PWH | Management Pengaduan')

@section('content')

    <h1 class="fs-1 mb-5">Tambah Pengaduan</h1>
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
    <form class="form-control row g-2 py-3" method="POST" enctype="multipart/form-data"
        action={{ route('admin.pengaduan.tambah.post') }}>
        @csrf
        @method('POST')

        <x-input-label for="isi_pengaduan" :value="'Isi Pengaduan'" />
        <x-text-input type="text" class="rounded p-2" name="isi_pengaduan" />

        <x-input-label for="role" :value="'status'" />
        <select name="status" id="status_berita" class="rounded p-2">
            <option value="menunggu">Menunggu</option>
            <option value="diterima">Diterima</option>
            <option value="ditolak">Ditolak</option>
        </select>

        <x-input-label for="image_pengaduan" :value="'Image'" />
        <input type="file" accept=".jpg, .png, .jpeg" class="rounded p-2 form-control" name="file_pengaduan"
            id="file_pengaduan" />

        <div class="d-flex justify-content-center gap-5">
            <button type="submit" class="btn btn-primary p-3">{{ __('Tambah') }}</button>
            <button type="reset" class="btn btn-secondary p-3">{{ __('Reset') }}</button>
        </div>
    </form>

@endSection
