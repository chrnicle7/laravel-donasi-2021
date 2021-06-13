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
                </div>
                <div class="card-body">
                    {!!$blog->konten!!}
                </div>
            </div>

            <div class="d-flex justify-content-center">
                {{-- Button Delete --}}
                <button type="button" class="btn btn-sm btn-danger mx-2 float-left" data-bs-toggle="modal"
                    data-bs-target="#blog_destroy_{{$blog->id}}">
                    <i class="fas fa-trash"></i> Hapus
                </button>
                {{-- Button Edit --}}
                <a class="btn btn-warning float-right mx-2" href="{{route('admin.konten-blogs.edit', $blog->id)}}" role="button">
                    <i class="fas fa-edit"></i> Edit
                </a>
            </div>

            {{-- Modal Delete --}}
            <div class="modal fade text-left" id="blog_destroy_{{$blog->id}}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="$blog_dest_ttl_{{$blog->id}}">Apakah Anda yakin untuk menghapus blog {{$blog->nama_blog}}?</h5>
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
                            <form action="{{route('admin.konten-blogs.destroy', $blog->id)}}" method="POST">
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
