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
                <ul class="nav nav-tabs mx-4" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="donasi-tab" data-bs-toggle="tab" href="#donasi"
                            role="tab" aria-controls="donasi" aria-selected="true">Donasi terbuka</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="donasi-tab" data-bs-toggle="tab" href="#blog"
                            role="tab" aria-controls="donasi" aria-selected="true">Blog terkini</a>
                    </li>
                </ul>
                <div class="tab-content mx-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="donasi" role="tabpanel"
                        aria-labelledby="donasi-tab">
                        <p class="my-3"></p>
                        @foreach ($programs as $program)
                            <div class="col-md-4 col-12" style="height: 300px">
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
                    <div class="tab-pane fade show" id="blog" role="tabpanel"
                        aria-labelledby="blog-tab">
                        <p class="my-3"></p>
                        @foreach ($blogs as $blog)
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ $blog->judul }}</h4>
                                </div>
                                <div class="card-body">
                                    <p>
                                        Author: {{ $blog->author->nama }} - Ditulis pada: {{ $blog->inserted_at }}
                                    </p>
                                    <hr>
                                    {!! $blog->konten !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
