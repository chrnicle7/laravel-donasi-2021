@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Program</h3>
                </div>
                @include('includes.greeting')
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('relawan.programs.update', $program->id)}}" method="post" id="edit_program" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <label for="edit_nama_program">Nama Program</label>
                            <input type="text" id="edit_nama_program" name="edit_nama_program" class="form-control" value="{{$program->nama_program}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="edit_target">Target</label>
                            <div class="input-group mb-3" id="edit_target">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" class="form-control" name="edit_target" value="{{$program->target}}">
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="snow" class="form-label">Info</label>
                            <div id="snow">
                                {!! $program->info !!}
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="edit_batas_akhir">Batas akhir</label>
                            <input type="text" id="edit_batas_akhir" name="edit_batas_akhir" class="form-control" value="{{$program->batas_akhir}}"></p>
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
            $("#edit_batas_akhir").datepicker({
                dateFormat:"yy-mm-dd",
            });

            $("#edit_program").on("submit", function () {
                var hvalue = $('.ql-editor').html();
                $(this).append("<textarea name='edit_info' style='display:none'>"+hvalue+"</textarea>");
            });
        } );
    </script> 
@endpush