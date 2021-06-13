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
            {{-- Card Menambahkan Fundraiser --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambahkan Fundriser Program {{$programTitle}}</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('relawan.program-fundraisers.update', $idprogram)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i
                                    class="bi bi-search"></i></span>
                            <input type="email" class="form-control"
                                placeholder="Tulis email fundraiser"
                                aria-label="Tulis email fundraiser"
                                aria-describedby="button-addon2" name="search_email_fund">
                            <button class="btn btn-outline-secondary" type="submit"
                                id="button-addon2">Cari</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Card Menampilkan data fundraiser --}}
            @if (isset($fundraiserFound))
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Fundraiser</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="{{route('relawan.program-fundraisers.store')}}" method="post">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>First Name</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="first-name" class="form-control"
                                            name="nama" placeholder="First Name" value="{{$fundraiserFound->nama}}" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="email" id="email-id" class="form-control"
                                            name="email" placeholder="Email" value="{{$fundraiserFound->email}}" disabled>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        @if($fundraiserFound->is_verified)
                                        <span class="badge bg-success">Terverifikasi</span>
                                        @else
                                        <span class="badge bg-danger">Belum Terferivikasi</span>
                                        @endif
                                    </div>
                                    <input type="hidden" name="idprogram" value="{{$idprogram}}">
                                    <input type="hidden" name="idfundraiser" value="{{$fundraiserFound->id}}">

                                    <button type="submit" class="btn btn-primary me-1" style="margin-top: 30px;">Tambahkan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </section>
    </div>
@stop
