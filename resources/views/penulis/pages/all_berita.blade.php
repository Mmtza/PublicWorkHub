@extends('penulis.layout.template')

@section('title', 'PWH | Management Berita')

@section('content')

    <div class="container">
        <h1 class="fs-1 mb-5">Management Berita</h1>
        <div class="d-flex mb-3">
            <a href={{ route('penulis.berita.tambah') }} class="btn btn-primary ms-auto">Tambah</a>
        </div>    
        <table class="table" id="myTable">
            <thead class="text-center">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Judul</th>
                    <th class="text-center">Isi</th>
                    <th class="text-center">Waktu Publish</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Gambar</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @php
                    $no = 1;
                @endphp
                @foreach ($berita as $row)
                    @php
                        $originalString = htmlspecialchars_decode($row->isi);
                        $maxCharacters = 50;
                        $truncatedString = Str::limit($originalString, $maxCharacters, '...');
                    @endphp
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ ucfirst($row->judul) }}</td>
                        <td class="text-center">{!! ucfirst($truncatedString) !!}</td>
                        <td class="text-center">
                            {{ \Carbon\Carbon::parse($row->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}
                        </td>
                        <td class="text-center">{{ ucfirst($row->status) }}</td>
                        <td class="text-center">
                            @if ($row->img)
                                <span>{{ $row->img }}</span>
                            @else
                                <span>Gambar tidak tersedia</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('penulis.berita.edit', $row->slug) }}" class="edit"><i
                                        class="bi bi-pencil-square" data-toggle="tooltip" title="Edit"></i></a>

                                <a href="{{ route('penulis.berita.preview', $row->slug) }}" class="preview"><i
                                        class="bi bi-card-text" data-toggle="tooltip" title="Preview"></i></a>

                                <form class="delete" method="POST" action="{{ route('penulis.berita.delete', $row->slug) }}"
                                    id="deleteBeritaForm{{ $row->id }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-none p-0">
                                        <i class="bi bi-trash3-fill" data-toggle="tooltip" title="Delete"></i>
                                    </button>
                                </form>
                                <script>
                                    document.getElementById('deleteBeritaForm' + {{ $row->id }}).addEventListener('submit', function(e) {
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
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endSection
