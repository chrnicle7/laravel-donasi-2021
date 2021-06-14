@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 order-md-1 order-last">
                    <h3>Berita Progam {{$berita->program->nama_program}}</h3>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5>{{$berita->judul}}</h5>
                </div>
                <div class="card-body">
                    <p>Dibuat pada: {{$berita->inserted_at}}</p>
                    <hr>

                    {!! $berita->konten_berita !!}
                </div>
            </div>
        </section>
    </div>
@endsection
