@extends('admin.layout.main')
@section('title')
    Penerbit
@endsection
@section('path')
    Admin
@endsection
@section('pages')
    Penerbit
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            @if (session()->has('success'))
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            @if ($errors->any())
                <div class="col-md-6">

                    @foreach ($errors->all() as $err)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $err }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                </div>
            @endif
            <button class="btn btn-md btn-primary mb-3" data-toggle="modal" data-target="#adddmodal">Tambah
                Penerbit</button>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Penerbit</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Penerbit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $d->penerbit }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#editmodal{{ $d->id }}"><i
                                                class="fa-solid fa-pencil"></i></button>
                                        {{-- <form action="/admin/kategori/hapus/{{ $d->id }}" class="d-inline"
                                            method="post">
                                            @csrf
                                            <button onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"
                                                class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                                        </form> --}}
                                        <a href="/admin/penerbit/delete/{{ $d->id }}"
                                            class="d-inline btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editmodal{{ $d->id }}" tabindex="-1"
                                    aria-labelledby="addmodal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addmodal">Edit penerbit</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('edit.penerbit') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $d->id }}">
                                                    <div class="form-group">
                                                        <label for="nama">Nama penerbit</label>
                                                        <input type="text" class="form-control" name="penerbit"
                                                            id="nama" value="{{ $d->penerbit }}">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" value="Tambah">
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="adddmodal" tabindex="-1" aria-labelledby="addmodal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addmodal">Tambah penerbit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tambah.penerbit') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama penerbit</label>
                            <input type="text" class="form-control" name="penerbit" id="nama"
                                placeholder="Nama penerbit">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Tambah">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
