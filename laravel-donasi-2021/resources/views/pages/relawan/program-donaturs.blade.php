@extends('layouts.master')
@section('tableId', '#program-donaturs')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manajemen Donatur Program</h3>
                </div>
                @include('includes.greeting')
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
                            <h4 class="card-title">Daftar Donatur</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="program-donaturs">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Nama Pengirim</th>
                                <th class="text-center">Atas Nama</th>
                                <th class="text-center">Vendor Rekening</th>
                                <th class="text-center">Rekening</th>
                                <th class="text-center">Nominal Donasi</th>
                                <th class="text-center">Status verifikasi</th>
                                <th class="text-center">Status donasi</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donaturs as $donatur)
                            <tr>
                                <td class="text-center">{{$donatur->id}}</td>
                                <td >{{$donatur->nama_pengirim}}</td>
                                <td>{{$donatur->atas_nama}}</td>
                                <td>{{$donatur->rekening->vendor->nama}}</td>
                                <td class="text-center">{{$donatur->no_rekening_pengirim }}</td>
                                <td class="text-center">{{$donatur->nominal_donasi }}</td>
                                <td class="text-center">
                                    @if($donatur->status_verifikasi == "menunggu verifikasi")
                                        <span class="badge bg-info">{{ $donatur->status_verifikasi }}</span>
                                    @elseif ($donatur->status_verifikasi == "ditolak")
                                        <span class="badge bg-danger">{{ $donatur->status_verifikasi }}</span>
                                    @elseif ($donatur->status_verifikasi == "terverifikasi")
                                        <span class="badge bg-success">{{ $donatur->status_verifikasi }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($donatur->status_donasi == "proses penghimpunan")
                                        <span class="badge bg-info">{{ $donatur->status_donasi }}</span>
                                    @elseif ($donatur->status_donasi == "tertunda")
                                        <span class="badge bg-secondary">{{ $donatur->status_donasi }}</span>
                                    @elseif ($donatur->status_donasi == "tersalurkan")
                                        <span class="badge bg-success">{{ $donatur->status_donasi }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-warning block" data-bs-toggle="modal"
                                        data-bs-target="#edit-donatur-{{$donatur->id}}">
                                        Edit data
                                    </button>
                                </td>
                            </tr>

                            {{-- Modal Edit Data --}}
                            <div class="modal fade text-left" id="edit-donatur-{{$donatur->id}}" tabindex="-1" role="dialog" aria-labelledby="edit-donatur-{{$donatur->id}}Label33" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="edit-donatur-{{$donatur->id}}Label33">Edit Donatur #{{$donatur->id}}</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <form action="{{ route('relawan.program-donaturs.update', $donatur->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body">
                                                <label>Nama Pengirim: </label>
                                                <div class="form-group">
                                                    <input type="text" placeholder="{{ $donatur->nama_pengirim }}"
                                                        class="form-control" disabled>
                                                </div>
                                                <label>Atas Nama: </label>
                                                <div class="form-group">
                                                    <input type="text" placeholder="{{ $donatur->atas_nama }}"
                                                        class="form-control" disabled>
                                                </div>
                                                <label>Email: </label>
                                                <div class="form-group">
                                                    <input type="text" placeholder="{{ $donatur->email }}"
                                                        class="form-control" disabled>
                                                </div>
                                                <label>Vendor Rekening: </label>
                                                <div class="form-group">
                                                    <input type="text" placeholder="{{ $donatur->rekening->vendor->nama }}"
                                                        class="form-control" disabled>
                                                </div>
                                                <label>Nomor Rekening: </label>
                                                <div class="form-group">
                                                    <input type="text" placeholder="{{ $donatur->no_rekening_pengirim }}"
                                                        class="form-control" disabled>
                                                </div>
                                                <label>Pesan: </label>
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="3" disabled>{{ $donatur->pesan }}</textarea>
                                                </div>
                                                <label>Status Verifikasi: </label>
                                                <div class="form-group">
                                                    <select class="form-control form-select" id="change_status_verifikasi" name="change_status_verifikasi">
                                                        <option value="menunggu verifikasi" {{ $donatur->status_verifikasi == "menunggu verifikasi" ? "selected" : ""}}>Menunggu verifikasi</option>
                                                        <option value="ditolak" {{ $donatur->status_verifikasi == "ditolak" ? "selected" : ""}}>Ditolak</option>
                                                        <option value="terverifikasi" {{ $donatur->status_verifikasi == "terverifikasi" ? "selected" : ""}}>Terverifikasi</option>
                                                    </select>
                                                </div>
                                                <label>Status Donasi: </label>
                                                <div class="form-group">
                                                    <select class="form-control form-select" id="change_status_donasi" name="change_status_donasi">
                                                        <option value="proses penghimpunan" {{ $donatur->status_donasi == "proses penghimpunan" ? "selected" : ""}}>Proses penghimpunan</option>
                                                        <option value="tertunda" {{ $donatur->status_donasi == "tertunda" ? "selected" : ""}}>Tertunda</option>
                                                        <option value="tersalurkan" {{ $donatur->status_donasi == "tersalurkan" ? "selected" : ""}}>Tersalurkan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button type="submit" class="btn btn-primary ml-1 my-4">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">SUBMIT</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
