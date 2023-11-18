@extends('admins.layout.template')

@section('title', 'Management Pengaduan')

@section('content')

<div class="container">
            <h1 class="fs-1 mb-5">Management Pengaduan</h1>
            <div class="d-flex mb-3">
            <a href={{ route('admin.pengaduan.tambah') }} class="btn btn-primary ms-auto">Tambah</a>
            </div>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="selectAll">
                            <label for="selectAll"></label>
                        </span>
                    </th>
                    <th>Name</th>
                    <th>Isi Pengaduan</th>
                    <th>Tanggal Pengaduan</th>
                    <th>Status</th>
                    <th>File</th>
                    <th>Action</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="checkbox1" name="options[]" value="1">
                            <label for="checkbox1"></label>
                        </span>
                    </td>
                    <td>John Doe</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque varius tellus ut ultricies imperdiet. Vivamus eu libero id justo varius dapibus. Etiam vel lacus vel felis dignissim convallis.</td>
                    <td>2023-01-15</td>
                    <td>Dalam Proses</td>
                    <td>dokumen1.pdf</td>
                    <td>
                        <a href="{{ route('admin.pengaduan.edit') }}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="checkbox2" name="options[]" value="1">
                            <label for="checkbox2"></label>
                        </span>
                    </td>
                    <td>John Doe</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque varius tellus ut ultricies imperdiet. Vivamus eu libero id justo varius dapibus. Etiam vel lacus vel felis dignissim convallis.</td>
                    <td>2023-01-15</td>
                    <td>Dalam Proses</td>
                    <td>dokumen1.pdf</td>
                    <td>
                        <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="checkbox3" name="options[]" value="1">
                            <label for="checkbox3"></label>
                        </span>
                    </td>
                    <td>John Doe</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque varius tellus ut ultricies imperdiet. Vivamus eu libero id justo varius dapibus. Etiam vel lacus vel felis dignissim convallis.</td>
                    <td>2023-01-15</td>
                    <td>Dalam Proses</td>
                    <td>dokumen1.pdf</td>
                    <td>
                        <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="checkbox4" name="options[]" value="1">
                            <label for="checkbox4"></label>
                        </span>
                    </td>
                    <td>John Doe</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque varius tellus ut ultricies imperdiet. Vivamus eu libero id justo varius dapibus. Etiam vel lacus vel felis dignissim convallis.</td>
                    <td>2023-01-15</td>
                    <td>Dalam Proses</td>
                    <td>dokumen1.pdf</td>
                    <td>
                        <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    </td>
                </tr>					
                <tr>
                    <td>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="checkbox5" name="options[]" value="1">
                            <label for="checkbox5"></label>
                        </span>
                    </td>
                    <td>John Doe</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque varius tellus ut ultricies imperdiet. Vivamus eu libero id justo varius dapibus. Etiam vel lacus vel felis dignissim convallis.</td>
                    <td>2023-01-15</td>
                    <td>Dalam Proses</td>
                    <td>dokumen1.pdf</td>
                    <td>
                        <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    </td>
                </tr> 
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