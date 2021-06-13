@extends('layouts.master')
@section('tableId', '#rekenings')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manajemen Rekening</h3>
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
                            <h4 class="card-title">Daftar Rekening</h4>
                        </div>
                        <div class="col-2">
                            {{-- Button Tambah --}}
                            <button type="button" class="btn btn-sm btn-primary float-right" data-bs-toggle="modal"
                                data-bs-target="#tambah_rekening">
                                Tambah rekening
                            </button>

                            {{-- Modal Tambah --}}
                            <div class="modal fade text-left" id="tambah_rekening" tabindex="-1"
                            role="dialog" aria-labelledby="tambah_rekening" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="tambah_rekening_title">Tambah rekening</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.rekenings.store')}}" method="POST">
                                            @csrf
                                            <div class="modal-body mx-4">
                                                <label for="tambah_vendor_rekening">Vendor rekening</label>
                                                <select class="form-select" id="tambah_vendor_rekening" name="tambah_vendor_rekening">
                                                    @foreach ($vendors as $vendor)
                                                    <option value="{{$vendor->id}}">{{$vendor->nama}}</option>
                                                    @endforeach
                                                </select>
                                                <label for="tambah_nama_rekening">Nama rekening</label>
                                                <input type="text" id="tambah_nama_rekening" name="tambah_nama_rekening" class="form-control" placeholder="Nama">
                                                <label for="tambah_nomor_rekening">Nomor rekening</label>
                                                <input type="text" id="tambah_nomor_rekening" name="tambah_nomor_rekening" class="form-control" placeholder="Nama">
                                                <div class="custom-control custom-checkbox my-3">
                                                    <input type="checkbox"
                                                        class="form-check-input form-check-primary form-check-glow" name="tambah_status_rekening" id="tambah_status_rekening">
                                                    <label class="form-check-label mx-1"
                                                        for="tambah_status_rekening">Aktif</label>
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
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="rekenings">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Vendor</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Nomor</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rekenings as $rekening)
                                <tr>
                                    <td class="text-center">{{$rekening->id}}</td>
                                    <td>{{$rekening->vendor->nama}}</td>
                                    <td>{{$rekening->nama_rekening}}</td>
                                    <td>{{$rekening->nomor_rekening}}</td>
                                    <td class="text-center">
                                        @if($rekening->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-danger">Tidak aktif</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{-- Button Edit --}}
                                        <button type="button" class="btn btn-sm btn-warning "data-bs-toggle="modal"
                                            data-bs-target="#rekening_edit_{{$rekening->id}}">
                                            <i class="fas fa-edit"></i>
                                        </button>

                                        {{-- Menu Delete --}}
                                        <button type="button" class="btn btn-sm btn-danger "data-bs-toggle="modal"
                                            data-bs-target="#rekening_destroy_{{$rekening->id}}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>

                                    {{-- Modal Edit --}}
                                    <div class="modal fade text-left" id="rekening_edit_{{$rekening->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="$rekening_dest_ttl_{{$rekening->id}}">Edit</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('admin.rekenings.update', $rekening->id)}}" method="POST">
                                                        @method('PATCH')
                                                        @csrf
                                                        <label for="vendor_rekening_{{$rekening->id}}">Vendor rekening</label>
                                                        <select class="form-select" id="vendor_rekening_{{$rekening->id}}" name="vendor_rekening">
                                                            @foreach ($vendors as $vendor)
                                                            <option value="{{$vendor->id}}" {{$vendor->id == $rekening->id_vendor ? "selected" : ""}}>{{$vendor->nama}}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="nama_rekening_{{$rekening->id}}">Nama rekening</label>
                                                        <input type="text" id="nama_rekening_{{$rekening->id}}" name="nama_rekening" class="form-control" value="{{$rekening->nama_rekening}}">
                                                        <label for="nomor_rekening_{{$rekening->id}}">Nomor rekening</label>
                                                        <input type="text" id="nomor_rekening_{{$rekening->id}}" name="nomor_rekening" class="form-control" value="{{$rekening->nomor_rekening}}">
                                                        <div class="custom-control custom-checkbox my-3">
                                                            <input type="checkbox"
                                                                class="form-check-input form-check-primary form-check-glow"
                                                                @if($rekening->is_active) checked @endif name="status" id="rekening_{{$rekening->id}}_status">
                                                            <label class="form-check-label mx-1"
                                                                for="rekening_{{$rekening->id}}_status">Aktif</label>
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
                                    <div class="modal fade text-left" id="rekening_destroy_{{$rekening->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="$rekening_dest_ttl_{{$rekening->id}}">Apakah Anda yakin untuk menghapus rekening {{$rekening->nama}}?</h5>
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
                                                    <form action="{{route('admin.rekenings.destroy', $rekening->id)}}" method="POST">
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


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@stop
