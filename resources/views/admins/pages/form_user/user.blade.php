@extends('admins.layout.template')

@section('title', 'PWH | Management User')

@section('content')

    <div class="container">
        <h1 class="fs-1 mb-5">Management User</h1>
        <div class="d-flex mb-3">
            <a href={{ route('admin.users.tambah') }} class="btn btn-primary ms-auto">Tambah</a>
        </div>
        <table class="table" id="myTable">
            <thead class="text-center">
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Tanggal Lahir</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($users as $user)                    
                    <tr>
                        <td class="text-center">{{ $user->name }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center">{{ $user->alamat }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($user->tanggal_lahir)->locale('id')->isoFormat('DD MMMM YYYY') }}</td>
                        <td class="text-center">{{ $user->role }}</td>
                        <td class="text-center">
                            @if (!empty($user->foto))
                                <div class="avatar avatar-3xl">
                                    <img src="{{ asset('assets/users/images/' . $user->foto) }}" alt="">
                                </div>
                            @else
                                Foto tidak tersedia
                            @endif
                        </td>
                        <td class="text-center d-flex align-items-center">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="edit" data-toggle="modal"><i class="bi bi-pencil-square"
                                    data-toggle="tooltip" title="Edit"></i></a>
                                    
                            <form class="delete" method="POST" action="{{ route('admin.users.delete', $user->id) }}" id={{ 'deleteUserForm'. $user->id }}>
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-none">
                                    <i class="bi bi-trash3-fill"
                                        data-toggle="tooltip" title="Delete"></i>
                                </button>
                            </form>
                            <script>
                                document.getElementById('deleteUserForm' + {{  $user->id }}).addEventListener('submit', function(e) {
                                    e.preventDefault();
                            
                                    Swal.fire({
                                        title: 'Apakah kamu yakin?',
                                        text: 'Ingin menghapus user ini',
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
