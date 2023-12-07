@extends('penyedia_loker.layout.template')

@section('title', 'PWH | Management Loker')

@section('content')
    <div class="container">
        <h1 class="fs-1 mb-5">Management Loker</h1>

        <div class="d-flex mb-3">
            <a href={{ route('penyedia-loker.loker.tambah') }} class="btn btn-primary ms-auto">Tambah</a>
        </div>
        <table class="table" id="myTable">
            <thead class="text-center">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Loker</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center">Waktu Publish</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @php
                    $no = 1;
                @endphp
                @foreach ($loker as $row)
                    @php
                        $originalString = htmlspecialchars_decode($row->deskripsi_loker);
                        $maxCharacters = 50;
                        $truncatedString = Str::limit($originalString, $maxCharacters, '...');
                    @endphp
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ ucfirst($row->nama_loker) }}</td>
                        <td class="text-center">{!! ucfirst($row->alamat) !!}</td>
                        <td class="text-center">{!! ucfirst($truncatedString) !!}</td>
                        <td class="text-center">
                            {{ \Carbon\Carbon::parse($row->waktu_publikasi)->locale('id')->isoFormat('dddd, DD MMMM YYYY,  hh:mm:ss') }}
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('penyedia-loker.loker.edit', $row->slug) }}" class="edit"><i
                                        class="bi bi-pencil-square" data-toggle="tooltip" title="Edit"></i></a>

                                <a href="{{ route('penyedia-loker.loker.preview', $row->slug) }}" class="preview"><i
                                        class="bi bi-card-text" data-toggle="tooltip" title="Preview"></i></a>

                                <form class="delete" method="POST" action="{{ route('penyedia-loker.loker.delete', $row->slug) }}"
                                    id="deleteLokerForm{{ $row->id }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-none p-0">
                                        <i class="bi bi-trash3-fill" data-toggle="tooltip" title="Delete"></i>
                                    </button>
                                </form>
                                <script>
                                    document.getElementById("deleteLokerForm" + {{ $row->id }}).addEventListener('submit', function(e) {
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
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endSection
