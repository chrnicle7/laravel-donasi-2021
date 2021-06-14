@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 order-md-1 order-last">
                    <h5>Tambahkan berita pada program {{$program->nama_program}}</h5>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('relawan.program-beritas.store')}}" method="post" id="tambah_berita">
                        @csrf
                        <div class="form-group">
                            <label for="tambah_judul_berita">Judul berita</label>
                            <input type="text" id="tambah_judul_berita" name="tambah_judul_berita" class="form-control" value="{{ old('tambah_judul_berita') }}">
                        </div>

                        <input type="hidden" name="tambah_id_program" value="{{$program->id}}">

                        <div class="form-group">
                            <label for="full">Konten berita</label>
                            <div id="full">
                                <p>Hello World!</p>
                                <p>Some initial <strong>bold</strong> text</p>
                                <p><br></p>
                            </div>
                        </div>

                        <div class="custom-control custom-checkbox my-3">
                            <input type="checkbox"
                                class="form-check-input form-check-primary form-check-glow"
                                name="tambah_status_berita" id="tambah_status_berita">
                            <label class="form-check-label mx-1"
                                for="tambah_status_berita">Aktif</label>
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
            $("#tambah_berita").on("submit", function () {
                var hvalue = $('.ql-editor').html();
                $(this).append("<textarea name='tambah_konten_berita' style='display:none'>"+hvalue+"</textarea>");
            });
        } );
    </script>
@endpush
