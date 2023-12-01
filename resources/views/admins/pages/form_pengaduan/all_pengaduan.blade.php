@extends('admins.layout.template')

@section('title', 'PWH | Management Pengaduan')

@section('content')

    <div class="container">
        <h1 class="fs-1 mb-5">Management Pengaduan</h1>
        <div class="d-flex mb-3">
            <a href={{ route('admin.pengaduan.tambah') }} class="btn btn-primary ms-auto">Tambah</a>
        </div>
        <table class="table" id="myTable">
            <thead class="text-center">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Pelapor</th>
                    <th class="text-center">Isi Pengaduan</th>
                    <th class="text-center">Waktu Pengaduan</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">File</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @php
                    $no = 1;
                @endphp
                @foreach ($pengaduan as $row)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ ucfirst($row->user->name) }}</td>
                        <td class="text-center">{{ ucfirst($row->isi_pengaduan) }}</td>
                        <td class="text-center">{{ date('d M Y', strtotime($row->waktu_pengaduan)) }}</td>
                        <td class="text-center">{{ ucfirst($row->status) }}</td>
                        <td class="text-center">
                            @if ($row->file)
                                <span>{{ $row->file }}</span>
                                <br>
                                <a href="{{ route('users.pengaduan.download', $row->file) }}" data-toggle="modal"><i
                                        data-toggle="tooltip" title="Download">Download</i></a>
                            @else
                                <span>File tidak tersedia</span>
                            @endif
                        </td>
                        <td class="text-center d-flex align-items-center">
                            {{-- <a href="{{ asset('assets/pengaduan/files/' . $row->file) }}" download data-toggle="modal"><i
                                    data-toggle="tooltip" title="Download">Download</i></a> --}}
                            <a href="{{ route('admin.pengaduan.edit', $row->id) }}" class="edit"><i
                                    class="bi bi-pencil-square" data-toggle="tooltip" title="Edit"></i></a>

                            <form class="delete" method="POST"
                                action="{{ route('admin.pengaduan.delete', $row->id) }}" id="deletePengaduanForm">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-none">
                                    <i class="bi bi-trash3-fill"
                                        data-toggle="tooltip" title="Delete"></i>                                    
                                </button>
                            </form>
                            <script>
                                document.getElementById('deletePengaduanForm').addEventListener('submit', function(e) {
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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endSection
