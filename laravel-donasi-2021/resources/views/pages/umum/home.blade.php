@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Selamat Datang di Sistem Donasi!</h3>
                </div>
            </div>
        </div>
        <section class="section my-4">
            <div class="row">
                @foreach ($programs as $program)
                    <div class="col-md-4" style="height: 300px">
                        <div class="card">
                            <div class="card-content">
                                <img src="{{ asset('/storage/images/program/'.$program->gambarProgram->nama) }}" class="card-img-top img-fluid"
                                    alt="singleminded" style="height: 250px">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $program->nama_program }}</h5>
                                    <p class="card-text">
                                        <p>Target donasi: Rp.{{$program->target}}</p>
                                        <p>Batas donasi: {{$program->batas_akhir}}</p>
                                    </p>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-primary" href="{{ route('detail_donasi', $program->id) }}" role="button">Donasi Sekarang!</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@stop
