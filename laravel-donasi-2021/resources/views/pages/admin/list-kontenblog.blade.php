@extends('layouts.master')
@section('tableId', '#konten-blogs')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manajemen Konten Blog</h3>
                    <p class="text-subtitle text-muted"></p>
                </div>
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
                        <h4 class="card-title">Daftar Konten</h4>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-primary btn-sm" href="{{route('admin.konten-blogs.create')}}" role="button">
                            <i class="fas fa-plus-circle"></i> Buat konten blog
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="konten-blogs">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Author</th>
                            <th class="text-center">Dibuat pada</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kontens as $konten)
                            <tr>
                                <td class="text-center">{{$konten->id}}</td>
                                <td class="text-center">{{$konten->judul}}</td>
                                <td class="text-center">{{$konten->author->nama}}</td>
                                <td class="text-center">{{$konten->inserted_at}}</td>
                                <td class="text-center">
                                    {{-- Button Edit --}}
                                    <a class="btn btn-warning btn-sm" href="{{route('admin.konten-blogs.edit', $konten->id)}}" role="button">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    {{-- Button View --}}
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.konten-blogs.show', $konten->id)}}" role="button">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@stop
