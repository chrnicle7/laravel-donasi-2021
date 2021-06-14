@extends('layouts.master')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 order-md-1 order-last">
                    <h3>Detail Program {{$program->nama_program}}</h3>
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
                                <th width="40%">Batas akhir</th>
                                <td>{{$program->batas_akhir}}</td>
                            </tr>
                            <tr>
                                <th width="40%">Target</th>
                                <td>{{$program->target}}</td>
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
                    <div class="row">
                        <div class="col-md-9 my-0">
                            <h4 class="card-title">Daftar fundraiser</h4>
                        </div>
                        <div class="col-md-3" style="text-align: right">
                            <a class="btn btn-success" href="{{route('relawan.program-fundraisers.show', $program->id)}}" role="button">
                                <i class="fas fa-funnel-dollar"></i>   Manajemen fundraiser
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul>
                        @foreach ($program->fundraisers as $fundraiser)
                            <li>{{$fundraiser->nama}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9 my-0">
                            <h4 class="card-title">Informasi donatur</h4>
                        </div>
                        <div class="col-md-3" style="text-align: right">
                            <a class="btn btn-primary" href="{{route('relawan.program-donaturs.show', $program->id)}}" role="button">
                                <i class="fas fa-donate"></i>    Manajemen donatur
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <ul class="list-group">
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Menunggu verifikasi</span>
                                <span class="badge bg-warning badge-pill badge-round ml-1">{{$jmlMenunggu}}</span>
                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Ditolak</span>
                                <span class="badge bg-danger badge-pill badge-round ml-1">{{$jmlDitolak}}</span>
                            </li>
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center">
                                <span>Terverifikasi</span>
                                <span class="badge bg-success badge-pill badge-round ml-1">{{$jmlTerverifikasi}}</span>
                            </li>
                        </ul>
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

            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-9 my-0">
                            <h4 class="card-title">Berita</h4>
                        </div>
                        <div class="col-md-3" style="text-align: right">
                            <a class="btn btn-info" href="{{route('relawan.program-beritas.index', $program->id)}}" role="button">
                                Manajemen Berita
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="list-group">
                            @foreach ($beritas as $berita)
                                    <a href="{{ route('relawan.program-beritas.show', $berita->id) }}" class="list-group-item list-group-item-action">
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

            <div class="d-flex justify-content-center">
                {{-- Button Delete --}}
                <button type="button" class="btn btn-sm btn-danger mx-2 float-left" data-bs-toggle="modal"
                    data-bs-target="#program_destroy_{{$program->id}}">
                    <i class="fas fa-trash"></i> Hapus
                </button>
                {{-- Button Edit --}}
                <a class="btn btn-warning float-right mx-2" href="{{route('relawan.programs.edit', $program->id)}}" role="button">
                    <i class="fas fa-edit"></i> Edit
                </a>
            </div>

            {{-- Modal Delete --}}
            <div class="modal fade text-left" id="program_destroy_{{$program->id}}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="$program_dest_ttl_{{$program->id}}">Apakah Anda yakin untuk menghapus program {{$program->nama_program}}?</h5>
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
                            <form action="{{route('relawan.programs.destroy', $program->id)}}" method="POST">
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
