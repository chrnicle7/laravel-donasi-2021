@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Program</h3>
                </div>
                @include('includes.greeting')
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('relawan.programs.store')}}" method="post" id="tambah_program" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tambah_nama_program">Nama Program</label>
                            <input type="text" id="tambah_nama_program" name="tambah_nama_program" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="tambah_target">Target</label>
                            <div class="input-group mb-3" id="tambah_target">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" class="form-control" name="tambah_target">
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="snow" class="form-label">Info</label>
                            <div id="snow">
    
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tambah_gambar_program">Upload Gambar</label>
                            <input type="file" name="tambah_gambar_program" style="display: block">
                        </div>
    
                        <div class="form-group">
                            <label for="tambah_batas_akhir">Batas akhir</label>
                            <input type="text" id="tambah_batas_akhir" name="tambah_batas_akhir" class="form-control"></p>
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
            $("#tambah_batas_akhir").datepicker({
                dateFormat:"yy-mm-dd",
            });

            $("#tambah_program").on("submit", function () {
                var hvalue = $('.ql-editor').html();
                $(this).append("<textarea name='tambah_info' style='display:none'>"+hvalue+"</textarea>");
            });
        } );
    </script> 
@endpush