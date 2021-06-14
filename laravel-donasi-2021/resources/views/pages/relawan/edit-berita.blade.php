@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 order-md-1 order-last">
                    <h3>Edit Berita Program {{$berita->program->nama_program}}</h3>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('relawan.program-beritas.update', $berita->id)}}" method="post" id="edit_berita">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="edit_judul_berita">Judul berita</label>
                            <input type="text" id="edit_judul_berita" name="edit_judul_berita" class="form-control" value={{$berita->judul}}>
                        </div>

                        <input type="hidden" name="edit_id_program" value="{{$berita->id_program}}">

                       <div class="form-group">
                            <label for="full">Isi berita</label>
                            <div id="full">
                                {!! $berita->konten_berita !!}
                            </div>
                        </div>

                        <div class="custom-control custom-checkbox my-3">
                            <input type="checkbox"
                                class="form-check-input form-check-primary form-check-glow"
                                name="edit_status_berita" id="edit_status_berita" {{$berita->is_active ? 'checked' : ''}}>
                            <label class="form-check-label mx-1"
                                for="edit_status_berita">Aktif</label>
                        </div>

                        <button type="submit" class="btn btn-primary ml-1 my-4">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">SUBMIT</span>
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@stop

@push('custom-scripts')
    <script>
          $( function() {
            $("#edit_berita").on("submit", function () {
                var hvalue = $('.ql-editor').html();
                $(this).append("<textarea name='edit_konten_berita' style='display:none'>"+hvalue+"</textarea>");
            });
        } );
    </script>
@endpush
