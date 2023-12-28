@extends('penyedia_loker.layout.template')

@section('title', 'Applier Loker')

@section('content')

    <div class="container">
        <h1 class="fs-1 mb-5">Applier Loker</h1>
        <table class="table" id="myTable">
            <thead class="text-center">
                <tr>
                    <th class="text-center">Loker</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Tanggal Lahir</th>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Action</th>
                    {{-- <th class="text-center">Actions</th> --}}
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($applier_loker as $apply)                    
                    <tr>
                        <td class="text-center">{{ $apply->getLoker->nama_loker }}</td>
                        <td class="text-center">{{ $apply->getUser->name }}</td>
                        <td class="text-center">{{ $apply->getUser->email }}</td>
                        <td class="text-center">{{ $apply->getUser->alamat }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($apply->getUser->tanggal_lahir)->locale('id')->isoFormat('DD MMMM YYYY') }}</td>
                        <td class="text-center">
                            @if (!empty($apply->getUser->foto))
                                <div class="avatar avatar-3xl">
                                    <img src="{{ asset('assets/users/images/' . $apply->getUser->foto) }}" alt="">
                                </div>
                            @else
                                Foto tidak tersedia
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center gap-2 justify-content-center">
                                <form method="POST" action="{{ route('penyedia-loker.loker.applier.approve', $apply->id) }}" id="approveUserForm{{ $apply->id }}">
                                    @csrf
                                    @method('post')                                    
                                    <button type="submit" class="btn btn-none p-0">
                                        <svg data-toggle="tooltip" title="approve" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#28a745" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                          </svg>                                
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('penyedia-loker.loker.applier.reject', $apply->id) }}" id="rejectUserForm{{ $apply->id }}">
                                    @csrf
                                    @method('post')
                                    <button type="submit" class="btn btn-none p-0">
                                        <svg data-toggle="tooltip" title="reject" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#dc3545" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                                          </svg>
                                    </button>
                                </form>
                                <script>
                                    document.getElementById("approveUserForm" + {{ $apply->id }}).addEventListener('submit', function(e) {
                                        e.preventDefault();

                                        Swal.fire({
                                            title: 'Apakah kamu yakin?',
                                            text: 'Ingin menerima lamaran user ini',
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Ya, Terima'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                // If confirmed, submit the form
                                                this.submit();
                                            }
                                        });
                                    });
                                    document.getElementById("rejectUserForm" + {{ $apply->id }}).addEventListener('submit', function(e) {
                                        e.preventDefault();

                                        Swal.fire({
                                            title: 'Apakah kamu yakin?',
                                            text: 'Ingin menolak lamaran user ini',
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: 'Ya, Tolak'
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
