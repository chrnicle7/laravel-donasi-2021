@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Konten</h3>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.konten-blogs.update', $blog->id)}}" method="post" id="edit_blog">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="edit_judul_blog">Judul Blog</label>
                            <input type="text" id="edit_judul_blog" name="edit_judul_blog" class="form-control" value={{$blog->judul}}>
                        </div>

                        <input type="hidden" name="edit_id_user" value="{{auth()->user()->id}}">

                       <div class="form-group">
                            <label for="full">Isi Blog</label>
                            <div id="full">
                                {!! $blog->konten !!}
                            </div>
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
            $("#edit_blog").on("submit", function () {
                var hvalue = $('.ql-editor').html();
                $(this).append("<textarea name='edit_isi_blog' style='display:none'>"+hvalue+"</textarea>");
            });
        } );
    </script>
@endpush
