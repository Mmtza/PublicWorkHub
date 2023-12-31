@extends('users.layout.template')

@section('title', 'Pengaduan')

@section('content')
    <div class="section search-result-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="heading">
                        <h1>Pengaduan Masyarakat</h1>
                        @if ($errors->any())
                            <div>
                                <ul class="alert alert-danger list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row posts-entry">
                <div class="col-lg-8">
                    <form action="{{ route('users.pengaduan.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <label for="isi_pengaduan" class="form-label">Isi Pengaduan</label>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" id="isi_pengaduan" name="isi_pengaduan" style="height: 100px"></textarea>
                            <label for="isi_pengaduan">Silahkan isi pengaduan sesuai dengan fakta</label>
                        </div>
                        <div class="mb-3 ">
                            <label for="file_pengaduan" class="form-label">Upload File</label>
                            <input type="file" class="form-control form-control-sm" id="file_pengaduan"
                                name="file_pengaduan">
                        </div>
                        <input type="submit" class="btn btn-outline-primary">
                    </form>
                </div>

                <div class="col-lg-4 sidebar">
                    <div class="sidebar-box">
                        <h3 class="heading">Daftar Pengaduan</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                @foreach ($pengaduan as $row)
                                    <li>
                                        <p>
                                        <div class="text-sm">
                                            <h6>{{ ucfirst($row['isi_pengaduan']) }}</h6>
                                            <div class="post-meta">
                                                <span class="mr-2">{{ $row['waktu_pengaduan'] }}</span>
                                            </div>
                                        </div>
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
