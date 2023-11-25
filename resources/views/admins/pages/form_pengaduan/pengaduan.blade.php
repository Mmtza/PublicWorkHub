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
                    <th class="text-center">Nama Pelapor</th>
                    <th class="text-center">Isi Pengaduan</th>
                    <th class="text-center">Waktu Pengaduan</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">File</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($pengaduan as $row)
                    <tr>
                        <td class="text-center">{{ $row->user->name }}</td>
                        <td class="text-center">{{ $row->isi_pengaduan }}</td>
                        <td class="text-center">{{ date('d M Y', strtotime($row->waktu_pengaduan)) }}</td>
                        <td class="text-center">{{ $row->status }}</td>
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
                        <td class="text-center">
                            {{-- <a href="{{ asset('assets/pengaduan/files/' . $row->file) }}" download data-toggle="modal"><i
                                    data-toggle="tooltip" title="Download">Download</i></a> --}}
                            <a href="{{ route('admin.pengaduan.edit') }}" class="edit" data-toggle="modal"><i
                                    class="bi bi-pencil-square" data-toggle="tooltip" title="Edit"></i></a>
                            <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
                                <i class="bi bi-trash" data-toggle="tooltip" title="Delete"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Add Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endSection
