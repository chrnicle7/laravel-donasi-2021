@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 order-md-1 order-last">
                    <h3>Donasi {{$program->nama_program}}</h3>
                </div>
            </div>
        </div>
        <section class="section my-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-10 my-0">
                                    <h4 class="card-title"></h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-center" style="margin-bottom: 20px;">
                                <img height="250px" src="{{ asset('/storage/images/program/'.$program->gambarProgram->nama) }}"
                                style="border-radius: 10px" alt="">
                            </div>
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

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-10 my-0">
                                    <h4 class="card-title">Progress pengumpulan dana</h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="text-align: right">
                            <h6 style="margin-bottom: 30px">Jumlah terkumpul</h6>
                            <div class="progress progress-primary  mb-4">
                                <div class="progress-bar progress-label" role="progressbar" style="width: {{$persTerkumpul}}%"
                                    aria-valuenow="{{$persTerkumpul}}" aria-valuemin="0" aria-valuemax="100" id="jmlKumpul"></div>
                            </div>

                            <h6 style="margin-bottom: 30px">Jumlah terverifikasi</h6>
                            <div class="progress progress-success  mb-4">
                                <div class="progress-bar progress-label" role="progressbar" style="width: {{$persVerif}}%"
                                    aria-valuenow="{{$persVerif}}" aria-valuemin="0" aria-valuemax="100" id="jmlVerif"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Info Program</h4>
                        </div>
                        <div class="card-body">
                            {!!$program->info!!}
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-10 my-0">
                                    <h4 class="card-title">Berita terkini</h4>
                                </div>
                                <div class="col-md-2" style="text-align: right">
                                    <a href="{{route('daftar_berita', $program->id)}}" type="button" class="btn btn-sm btn-primary float-right">
                                        Daftar Berita
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="list-group">
                                    @foreach ($beritas as $berita)
                                            <a href="{{ route('detail_berita', ['id' => $program->id, 'berita' => $berita->id]) }}" class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">{{ $berita->judul }}</h5>
                                                    <small>{{ $berita->inserted_at }}</small>
                                                </div>
                                                <hr>
                                                <p>Ditulis oleh: {{$berita->program->userProgram->nama}}</p>
                                            </a>
                                    @endforeach
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
                                        <input type="number" class="form-control" name="donatur_nominal_donasi" value="{{old('donatur_nominal_donasi')}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="donatur_vendor_rekening">Vendor donasi</label>
                                    <select class="form-select" id="donatur_vendor_rekening" name="donatur_vendor_rekening">
                                        @foreach ($vendors as $vendor)
                                        <option value="{{$vendor->id}}" {{ old('donatur_vendor_rekening') == $vendor->id ? "selected" : "" }}>{{$vendor->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="donatur_rekening">Rekening</label>
                                    <input type="text" id="donatur_rekening" name="donatur_rekening" class="form-control" value="{{old('donatur_rekening')}}">
                                </div>
                                <div class="form-group">
                                    <label for="donatur_nama_pengirim">Nama pengirim</label>
                                    <input type="text" id="donatur_nama_pengirim" name="donatur_nama_pengirim" class="form-control" value="{{old('donatur_nama_pengirim')}}">
                                </div>
                                <div class="form-group">
                                    <label for="donatur_atas_nama">Atas nama</label>
                                    <input type="text" id="donatur_atas_nama" name="donatur_atas_nama" class="form-control" value="{{old('donatur_atas_nama')}}">
                                </div>
                                <div class="form-group">
                                    <label for="donatur_email">Email</label>
                                    <input type="email" id="donatur_email" name="donatur_email" class="form-control" value="{{old('donatur_email')}}">
                                </div>
                                <div class="form-group">
                                    <label for="donatur_pesan" class="form-label">Pesan</label>
                                    <textarea class="form-control" id="donatur_pesan" name="donatur_pesan"
                                        rows="3">{{old('donatur_pesan')}}</textarea>
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
