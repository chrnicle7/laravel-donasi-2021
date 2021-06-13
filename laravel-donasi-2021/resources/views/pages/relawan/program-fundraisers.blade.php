@extends('layouts.master')
@section('tableId', '#fundraisers')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manajemen Fundraiser</h3>
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
            {{-- Card Manajemen fundraiser --}}
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-10">
                            <h4 class="card-title">Daftar Fundraiser Program {{$programTitle}}</h4>
                        </div>
                        <div class="col-2">
                            <a href="{{route('relawan.program-fundraisers.edit', $idprogram)}}" type="button" class="btn btn-sm btn-primary float-right">
                                Tambah Fundraiser
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="fundraisers">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($progFunds as $progFund)
                                <tr>
                                    <td class="text-center">{{$progFund->id}}</td>
                                    <td >{{$progFund->fundraiser->nama}}</td>
                                    <td >{{$progFund->fundraiser->email}}</td>
                                    <td  class="text-center">
                                        @if($progFund->fundraiser->is_verified)
                                        <span class="badge bg-success">Terverifikasi</span>
                                        @else
                                        <span class="badge bg-danger">Belum Terferivikasi</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger"
                                            data-bs-toggle="modal" data-bs-target="#del-fund-{{$progFund->fundraiser->id}}">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!--Danger theme Modal -->
                                        <div class="modal fade text-left" id="del-fund-{{$progFund->fundraiser->id}}" tabindex="-1"
                                            role="dialog" aria-labelledby="label1del-fund-{{$progFund->fundraiser->id}}"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h5 class="modal-title white" id="labeldel-fund-{{$progFund->fundraiser->id}}">
                                                            Hapus fundraiser
                                                        </h5>
                                                        <button type="button" class="close"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin untuk menghapus {{$progFund->fundraiser->nama}} dari daftar fundraiser?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button"
                                                            class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Tidak</span>
                                                        </button>
                                                        <form action="{{route('relawan.program-fundraisers.destroy', $progFund->id)}}" method="POST">
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
    </div>
@stop
