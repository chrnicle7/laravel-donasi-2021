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
                    <h5>{{$berita->judul}}</h5>
                </div>
                <div class="card-body">
                    <p>Dibuat pada: {{$berita->inserted_at}}</p>
                    <hr>

                    {!! $berita->konten_berita !!}
                </div>
            </div>

            <div class="d-flex justify-content-center">
                {{-- Button Delete --}}
                <button type="button" class="btn btn-sm btn-danger mx-2 float-left" data-bs-toggle="modal"
                    data-bs-target="#destroy-berita">
                    <i class="fas fa-trash"></i> Hapus
                </button>
                {{-- Button Edit --}}
                <a class="btn btn-warning float-right mx-2" href="{{route('relawan.program-beritas.edit', $berita->id)}}" role="button">
                    <i class="fas fa-edit"></i> Edit
                </a>
            </div>

            {{-- Modal Delete --}}
            <div class="modal fade text-left" id="destroy-berita" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="destroy_berita">Apakah Anda yakin untuk menghapus berita {{$berita->judul}}?</h5>
                            <button type="button" class="close rounded-pill"
                                data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Tidak</span>
                            </button>
                            <form action="{{route('relawan.program-beritas.destroy', $berita->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger ml-1">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Ya</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
