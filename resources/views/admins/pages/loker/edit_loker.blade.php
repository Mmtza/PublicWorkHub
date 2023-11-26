@extends('admins.layout.template')

@section('title', 'PWH | Management Loker')

@section('content')

    <h1 class="fs-1 mb-5">Edit Loker</h1>
    <form class="d-flex mb-3" method="POST" action="{{ route('admin.loker.delete', $loker->id) }}" id="deleteLokerForm">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger ms-auto">Hapus</button>
    </form>
    <script>
        document.getElementById('deleteLokerForm').addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: 'Ingin menghapus loker ini',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    this.submit();
                }
            });
        });
    </script>
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
        action={{ route('admin.loker.edit.patch', $loker->id) }}>
        @csrf
        @method('patch')

        <x-input-label for="nama_loker" :value="'Nama Loker'" />
        <x-text-input type="text" class="rounded p-2" name="nama_loker" id="nama_loker" :value="old('nama_loker', $loker->nama_loker)" />

        <x-input-label for="deskripsi_loker" :value="'Deskripsi Loker'" />
        <div id="quilleditloker"
            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            style="min-height: 30vh;">
        </div>
        <x-text-input type="hidden" name="deskripsi_loker" id="deskripsi_loker" :value="old('deskripsi_loker', $loker->deskripsi_loker)" />

        <x-input-label for="alamat_loker" :value="'Alamat Loker'" />
        <x-text-input type="text" class="rounded p-2" name="alamat_loker" id="alamat_loker" />

        <x-input-label for="pembuat_loker" :value="'Dibuat Oleh'" />
        <x-text-input type="text" class="rounded p-2" name="pembuat_loker" id="pembuat_loker"
            value="{{ $publisherName }}" required disabled />

        <x-input-label for="kategori_loker" :value="'Kategori'" />
        <div class="d-flex gap-2 mb-3">
            @foreach ($kategori as $k)
                <div class="d-flex align-items-center gap-1">
                    <x-text-input type="checkbox" name="nama_kategori[]" value="{{ $k->nama_kategori }}"
                        id="{{ $k->nama_kategori }}" />
                    <label for="{{ $k->nama_kategori }}">{{ $k->nama_kategori }}</label>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center gap-5">
            <button type="submit" class="btn btn-primary p-3" onclick="sendDataEditLoker()">{{ __('Edit') }}</button>
            <button type="reset" class="btn btn-secondary p-3">{{ __('Reset') }}</button>
        </div>
    </form>

@endsection
