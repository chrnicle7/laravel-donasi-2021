@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>{{$blog->judul}}</h3>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            Ditulis oleh: {{ $blog->author->nama }}
                        </div>
                        <div class="col-md-2">
                            {{$blog->inserted_at}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!!$blog->konten!!}
                </div>
            </div>
        </section>
    </div>
@endsection
