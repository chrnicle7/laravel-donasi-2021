@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Saran</h3>
                </div>
            </div>
        </div>
        <section class="section my-4">
            <div class="row">
                <div class="col-md-12">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <div class="alert alert-{{ $msg }} alert-dismissible fade show">
                                {{ Session::get('alert-' . $msg) }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    @endforeach

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-10 my-0">
                                    <h4 class="card-title">Silahkan mengirim saran dengan mengisi form berikut</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('store_saran_umum')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" id="nama" name="nama" class="form-control" value="{{ old('nama') }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">Nomor Hp</label>
                                    <div class="input-group mb-3" id="no_hp">
                                        <span class="input-group-text">+62</span>
                                        <input type="number" class="form-control" name="no_hp" value="{{ old('no_hp') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="subyek">Subyek</label>
                                    <input type="text" id="subyek" name="subyek" class="form-control" value="{{ old('subyek') }}">
                                </div>
                                <div class="form-group">
                                    <label for="konten" class="form-label">Pesan</label>
                                    <textarea class="form-control" id="konten" name="konten"
                                        rows="3">{{ old('konten') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="captcha">
                                        <span>{!! captcha_img() !!}</span>
                                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                                            &#x21bb;
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha" value="{{ old('captcha') }}">
                                </div>
                                <button type="submit" class="btn btn-primary my-2 mx-1">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop

@push('custom-scripts')
    <script>
           $('#reload').click(function () {
                $.ajax({
                    type: 'GET',
                    url: '/reload-captcha',
                    success: function (data) {
                        console.log(data.captcha);
                        $(".captcha span").html(data.captcha);
                    }
                });
            });
    </script>
@endpush
