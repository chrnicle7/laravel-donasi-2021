@extends('layouts.master')
@section('tableId', '#sarans')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manajemen Saran</h3>
                    <p class="text-subtitle text-muted"></p>
                </div>
            </div>
        </div>
    </div>

    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
            <div class="alert alert-{{ $msg }} alert-dismissible fade show">
                {{ Session::get('alert-' . $msg) }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    @endforeach

    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        <h4 class="card-title">Daftar Saran</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="sarans">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Subyek</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sarans as $saran)
                            <tr>
                                <td class="text-center">{{$saran->id}}</td>
                                <td class="text-center">{{$saran->nama}}</td>
                                <td class="text-center">{{$saran->subyek}}</td>
                                <th class="text-center">
                                    @if($saran->verified_at)
                                        <span class="badge bg-success">Terverifikasi pada {{$saran->verified_at}}</span>
                                    @else
                                        <span class="badge bg-danger">Belum Terverifikasi</span>
                                    @endif
                                </th>
                                <td class="text-center">
                                    <button type="button" class="btn btn-warning block btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#edit-saran-{{$saran->id}}">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger block btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#del-saran-{{$saran->id}}">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                    {{-- Modal Edit Saran --}}
                                    <div class="modal fade text-left" id="edit-saran-{{$saran->id}}" tabindex="-1"
                                        role="dialog" aria-labelledby="label1edit-saran-{{$saran->id}}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-warning">
                                                    <h5 class="modal-title white" id="labeledit-saran-{{$saran->id}}">
                                                        Edit Saran
                                                    </h5>
                                                    <button type="button" class="close"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form action="{{ route('admin.saran.update', $saran->id) }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="modal-body" style="text-align: left">
                                                        <label>Nama Pengirim: </label>
                                                        <div class="form-group">
                                                            <input type="text" placeholder="{{ $saran->nama }}"
                                                                class="form-control" disabled>
                                                        </div>
                                                        <label>Email: </label>
                                                        <div class="form-group">
                                                            <input type="text" placeholder="{{ $saran->email }}"
                                                                class="form-control" disabled>
                                                        </div>
                                                        <label>Nomor hp: </label>
                                                        <div class="form-group">
                                                            <input type="text" placeholder="+62{{ $saran->no_hp }}"
                                                                class="form-control" disabled>
                                                        </div>
                                                        <label>Subyek: </label>
                                                        <div class="form-group">
                                                            <input type="text" placeholder="{{ $saran->subyek }}"
                                                                class="form-control" disabled>
                                                        </div>
                                                        <label>Konten: </label>
                                                        <div class="form-group">
                                                            <textarea class="form-control" rows="3" disabled>{{ $saran->konten }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Close</span>
                                                        </button>
                                                        @if(!$saran->verified_at)
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Verifikasi</span>
                                                            </button>
                                                        @endif
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Modal Hapus --}}
                                    <div class="modal fade text-left" id="del-saran-{{$saran->id}}" tabindex="-1"
                                        role="dialog" aria-labelledby="label1del-saran-{{$saran->id}}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title white" id="labeldel-saran-{{$saran->id}}">
                                                        Hapus Saran
                                                    </h5>
                                                    <button type="button" class="close"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin untuk menghapus saran dari {{$saran->nama}}?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                        class="btn btn-light-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Tidak</span>
                                                    </button>
                                                    <form action="{{route('admin.saran.destroy', $saran->id)}}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger ml-1">
                                                            <span class="d-none d-sm-block">Ya</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@stop
