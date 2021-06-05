@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Donasi {{$program->nama_program}}</h3>
                </div>
                @include('includes.greeting')
            </div>
        </div>
        <section class="section my-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <img src="{{ asset('/storage/images/program/'.$program->gambarProgram->nama) }}" class="card-img-top"
                                height="500px">
                            <div class="card-body">
                                <h5 class="card-title" style="margin-bottom: 50px">Detail program</h5>
                                <table class="table table-striped" id="programs">
                                    <tbody>
                                        <tr>
                                            <th width="40%">Relawan</th>
                                            <td>{{$program->userProgram->nama}}</td>
                                        </tr>
                                        <tr>
                                            <th width="40%">Target</th>
                                            <td>Rp. {{$program->target}}</td>
                                        </tr>
                                        <tr>
                                            <th width="40%">Batas akhir</th>
                                            <td>{{$program->batas_akhir}}</td>
                                        </tr>
                                        <tr>
                                            <th width="40%">Fundraiser</th>
                                            <td>
                                                <ul>
                                                    @foreach ($program->fundraisers as $fundraiser)
                                                        <li>{{$fundraiser->email}}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-10 my-0">
                                    <h4 class="card-title">Info Program</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            {!!$program->info!!}
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

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-10 my-0">
                                    <h4 class="card-title">Ayo, jadi donatur sekarang</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('kirim_donasi', $program->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="donatur_nominal_donasi">Nominal donasi</label>
                                    <div class="input-group mb-3" id="donatur_nominal_donasi">
                                        <span class="input-group-text">Rp.</span>
                                        <input type="number" class="form-control" name="donatur_nominal_donasi">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="donatur_vendor_rekening">Vendor donasi</label>
                                    <select class="form-select" id="donatur_vendor_rekening" name="donatur_vendor_rekening">
                                        @foreach ($vendors as $vendor)
                                        <option value="{{$vendor->id}}">{{$vendor->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="donatur_rekening">Rekening</label>
                                    <input type="text" id="donatur_rekening" name="donatur_rekening" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="donatur_nama_pengirim">Nama pengirim</label>
                                    <input type="text" id="donatur_nama_pengirim" name="donatur_nama_pengirim" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="donatur_atas_nama">Atas nama</label>
                                    <input type="text" id="donatur_atas_nama" name="donatur_atas_nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="donatur_email">Email</label>
                                    <input type="email" id="donatur_email" name="donatur_email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="donatur_pesan" class="form-label">Pesan</label>
                                    <textarea class="form-control" id="donatur_pesan" name="donatur_pesan"
                                        rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary my-2 mx-1">Donasi sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
