@extends('penyedia_loker.layout.template')

@section('title', 'Applier Loker')

@section('content')

    <div class="container">
        <h1 class="fs-1 mb-5">Applier Loker</h1>
        <table class="table" id="myTable">
            <thead class="text-center">
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Tanggal Lahir</th>
                    <th class="text-center">Foto</th>
                    {{-- <th class="text-center">Actions</th> --}}
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($users as $user)                    
                    <tr>
                        <td class="text-center">{{ $user->name }}</td>
                        <td class="text-center">{{ $user->email }}</td>
                        <td class="text-center">{{ $user->alamat }}</td>
                        <td class="text-center">{{ $user->tanggal_lahir }}</td>
                        <td class="text-center">{{ $user->foto }}</td>
                        {{-- <td class="text-center d-flex align-items-center">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="edit" data-toggle="modal"><i class="bi bi-eye-fill"
                                    data-toggle="tooltip" title="Edit"></i></a>                                                                        
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endSection
