@extends('layouts.master')
@section('tableId', '#beritas')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manajemen Berita</h3>
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
                            <h4 class="card-title">Daftar Berita Program {{$program->nama_program}}</h4>
                        </div>
                        <div class="col-2">
                            <a class="btn btn-primary btn-sm" href="{{route('relawan.program-beritas.create', $program->id)}}" role="button">
                                <i class="fas fa-plus-circle"></i> Tambahkan berita
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="beritas">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Dibuat pada</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($beritas as $berita)
                            <tr>
                                <td class="text-center">{{$berita->id}}</td>
                                <td>{{$berita->judul}}</td>
                                <td class="text-center">{{$berita->inserted_at}}</td>
                                <td class="text-center">
                                    @if($berita->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Tidak aktif</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-primary" href="{{route('relawan.program-beritas.show', $berita->id)}}" role="button">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a class="btn btn-warning" href="{{route('relawan.program-beritas.edit', $berita->id)}}" role="button">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
