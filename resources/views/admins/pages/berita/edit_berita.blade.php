@extends('admins.layout.template')

@section('title', 'PWH | Management Berita')

@section('content')

    <h1 class="fs-1 mb-5">Edit Berita</h1>
    <form class="d-flex mb-3" method="POST" action="{{ route('admin.berita.delete', $berita->slug) }}" id="deleteBeritaForm">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger ms-auto">Hapus</button>
    </form>
    <script>
        document.getElementById('deleteBeritaForm').addEventListener('submit', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: 'Ingin menghapus berita ini',
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
        action={{ route('admin.berita.edit.patch', $berita->slug) }}>
        @csrf
        @method('patch')

        <x-input-label for="judul_berita" :value="'Judul'" />
        <x-text-input type="text" class="rounded p-2" name="judul_berita" id="judul_berita" :value="old('judul_berita', $berita->judul)" />

        <x-input-label for="isi_berita" :value="'Isi'" />
        <div id="quilleditberita"
            class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            style="min-height: 30vh;">
        </div>
        <x-text-input type="hidden" name="isi_berita" id="isi_berita" :value="old('isi_berita', $berita->isi)" />

        <x-input-label for="status_berita" :value="'Status'" />
        <select name="status_berita" id="status_berita" class="rounded p-2">
            <option value="menunggu" {{ old('status_berita', $berita->status) == 'menunggu' ? 'selected' : '' }}>Menunggu
            </option>
            <option value="aktif" {{ old('status_berita', $berita->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="tidak aktif" {{ old('status_berita', $berita->status) == 'tidak aktif' ? 'selected' : '' }}>Tidak
                Aktif</option>
        </select>

        <x-input-label for="pembuat_berita" :value="'Dibuat Oleh'" />
        <x-text-input type="text" class="rounded p-2" name="pembuat_berita" id="pembuat_berita"
            value="{{ $publisherName }}" disabled />

        <x-input-label for="kategori_berita" :value="'Kategori'" />
        <div class="row mt-2">            
            @foreach ($kategori as $j)                    
                <div class="col-8 col-sm-6 col-md-4 col-lg-2">
                    <input type="checkbox" name="nama_kategori[]" value="{{ $j->nama_kategori }}"
                        id="{{ $j->nama_kategori }}" {{ $berita->getKategori->contains($j)? 'checked' :  ''}}/>
                    <label for="{{ $j->nama_kategori }}">{{ $j->nama_kategori }}</label>
                </div>
            @endforeach                
            </div>
        <x-input-label for="image_berita" :value="'Image'" />
        <input type="file" accept=".jpg, .png, .jpeg" class="rounded p-2 form-control" name="image_berita"
            id="image_berita" value="{{ $berita->img }}" />

        <div class="d-flex justify-content-center gap-5">
            <button type="submit" class="btn btn-primary p-3" onclick="sendDataEditBerita()">{{ __('Edit') }}</button>
            <button type="reset" class="btn btn-secondary p-3">{{ __('Reset') }}</button>
        </div>
    </form>

@endsection
