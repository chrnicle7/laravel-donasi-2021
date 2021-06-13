@extends('layouts.master')
@section('tableId', '#profesis')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manajemen Profesi</h3>
                    <p class="text-subtitle text-muted"></p>
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
                            <h4 class="card-title">Daftar Profesi</h4>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-sm btn-primary float-right" data-bs-toggle="modal"
                                data-bs-target="#tambah_profesi">
                                Tambah profesi
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="profesis">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profesis as $profesi)
                                <tr>
                                    <td class="text-center">{{$profesi->id}}</td>
                                    <td>{{$profesi->nama}}</td>
                                    <td class="text-center">
                                        @if($profesi->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Tidak aktif</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{-- Button Edit --}}
                                        <button type="button" class="btn btn-sm btn-warning "data-bs-toggle="modal"
                                            data-bs-target="#profesi_edit_{{$profesi->id}}">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        {{-- Menu Delete --}}
                                        <button type="button" class="btn btn-sm btn-danger "data-bs-toggle="modal"
                                            data-bs-target="#profesi_destroy_{{$profesi->id}}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>

                                    {{-- Modal Edit --}}
                                    <div class="modal fade text-left" id="profesi_edit_{{$profesi->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="$profesi_dest_ttl_{{$profesi->id}}">Edit</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('admin.profesis.update', $profesi->id)}}" method="POST">
                                                        @method('PATCH')
                                                        @csrf
                                                        <label for="nama_profesi_{{$profesi->id}}">Nama Profesi</label>
                                                        <input type="text" id="nama_profesi_{{$profesi->id}}" name="nama_profesi" class="form-control" value="{{$profesi->nama}}">
                                                        <div class="custom-control custom-checkbox my-3">
                                                            <input type="checkbox"
                                                                class="form-check-input form-check-primary form-check-glow"
                                                                @if($profesi->is_active) checked @endif name="status" id="profesi_{{$profesi->id}}_status">
                                                            <label class="form-check-label mx-1"
                                                                for="profesi_{{$profesi->id}}_status">Aktif</label>
                                                        </div>
                                                </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn" data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Batalkan</span>
                                                            </button>
                                                            <button type="submit" class="btn btn-primary ml-1" name="form_edit">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Edit</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Modal Delete --}}
                                    <div class="modal fade text-left" id="profesi_destroy_{{$profesi->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="$profesi_dest_ttl_{{$profesi->id}}">Apakah Anda yakin untuk menghapus profesi {{$profesi->nama}}?</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Tidak</span>
                                                    </button>
                                                    <form action="{{route('admin.profesis.destroy', $profesi->id)}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger ml-1">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Ya</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Modal Tambah --}}
                                    <div class="modal fade text-left" id="tambah_profesi" tabindex="-1"
                                        role="dialog" aria-labelledby="tambah_profesi" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="tambah_profesi_title">Tambah profesi</h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('admin.profesis.store')}}" method="POST">
                                                        @csrf
                                                        <div class="modal-body mx-4">
                                                            <label for="tambah_nama_profesi">Nama Profesi</label>
                                                            <input type="text" id="tambah_nama_profesi" name="tambah_nama_profesi" class="form-control" placeholder="Nama">
                                                            <div class="custom-control custom-checkbox my-3">
                                                                <input type="checkbox"
                                                                    class="form-check-input form-check-primary form-check-glow" name="tambah_status_profesi" id="tambah_status_profesi">
                                                                <label class="form-check-label mx-1"
                                                                    for="tambah_status_profesi">Aktif</label>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Close</span>
                                                            </button>
                                                            <button type="submit" class="btn btn-primary ml-1">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Tambahkan</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@stop
