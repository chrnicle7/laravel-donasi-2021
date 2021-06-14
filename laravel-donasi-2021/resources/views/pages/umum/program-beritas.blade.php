@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Berita</h3>
                </div>
            </div>
        </div>
        <section class="section my-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-10 my-0">
                                    <h4 class="card-title">Berita Program {{$program->nama_program}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                @foreach ($beritas as $berita)
                                    <div class="list-group my-2">
                                        <a href="{{route('detail_berita', ['id' => $program->id, 'berita' => $berita->id]) }}" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">{{ $berita->judul }}</h5>
                                                <small>{{ $berita->inserted_at }}</small>
                                            </div>
                                            <hr>
                                            <p>Ditulis oleh: {{$berita->program->userProgram->nama}}</p>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
