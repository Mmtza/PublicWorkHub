@extends('admins.layout.template')

@section('title', 'Management Loker')

@section('content')
    <h1 class="fs-1 mb-5">Management Loker</h1>
    <div class="d-flex mb-3">
        <a href={{ route('admin.loker.tambah') }} class="btn btn-primary ms-auto">Tambah</a>
    </div>
    <div class="d-flex flex-column flex-lg-row flex-wrap gap-3">
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                    content.</p>
                <a href="{{ route('admin.loker.edit') }}" class="btn btn-warning">
                    <div class="d-flex align-items-center gap-2">
                        <span class="fas fa-pencil"></span>
                        <span>Edit</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
