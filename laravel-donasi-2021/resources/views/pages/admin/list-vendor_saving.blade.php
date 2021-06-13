@extends('layouts.master')
@section('tableId', '#vendor-savings')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manajemen Vendor Saving</h3>
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
                            <h4 class="card-title">Daftar Vendor Saving</h4>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-sm btn-primary float-right" data-bs-toggle="modal"
                                data-bs-target="#tambah_vendor_saving">
                                Tambah Vendor Saving
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="vendor-savings">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendors as $vendor)
                                <tr>
                                    <td class="text-center">{{$vendor->id}}</td>
                                    <td>{{$vendor->nama}}</td>
                                    <td class="text-center">
                                        {{-- Button Edit --}}
                                        <button type="button" class="btn btn-sm btn-warning "data-bs-toggle="modal"
                                            data-bs-target="#vendor_edit_{{$vendor->id}}">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        {{-- Menu Delete --}}
                                        <button type="button" class="btn btn-sm btn-danger "data-bs-toggle="modal"
                                            data-bs-target="#vendor_destroy_{{$vendor->id}}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>

                                    {{-- Modal Edit --}}
                                    <div class="modal fade text-left" id="vendor_edit_{{$vendor->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="$vendor_dest_ttl_{{$vendor->id}}">Edit</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('admin.vendors.update', $vendor->id)}}" method="POST">
                                                        @method('PATCH')
                                                        @csrf
                                                        <label for="nama_vendor_{{$vendor->id}}">Nama vendor</label>
                                                        <input type="text" id="nama_vendor_{{$vendor->id}}" name="nama_vendor" class="form-control" value="{{$vendor->nama}}">
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
                                    <div class="modal fade text-left" id="vendor_destroy_{{$vendor->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="$vendor_dest_ttl_{{$vendor->id}}">Apakah Anda yakin untuk menghapus vendor {{$vendor->nama}}?</h5>
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
                                                    <form action="{{route('admin.vendors.destroy', $vendor->id)}}" method="POST">
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
                                    <div class="modal fade text-left" id="tambah_vendor_saving" tabindex="-1"
                                        role="dialog" aria-labelledby="tambah_vendor_saving" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="tambah_vendor_saving_title">Tambah vendor</h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('admin.vendors.store')}}" method="POST">
                                                        @csrf
                                                        <div class="modal-body mx-4">
                                                            <label for="tambah_nama_vendor">Nama vendor</label>
                                                            <input type="text" id="tambah_nama_vendor" name="tambah_nama_vendor" class="form-control" placeholder="Nama">
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
