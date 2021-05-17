@extends('layouts.master')
@section('tableId', '#programs')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manajemen Program</h3>
                </div>
                @include('includes.greeting')
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
                        <div class="col-10">
                            <h4 class="card-title">Daftar Program</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="programs">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Nama Program</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($programs as $program)
                            <tr>
                                <td class="text-center">{{$program->id}}</td>
                                <td >{{$program->nama_program}}</td>
                                <td class="text-center">
                                    <a class="btn btn-primary" href="{{route('relawan.programs.show', $program->id)}}" role="button">Detail</a>
                                    <a class="btn btn-warning" href="{{route('relawan.programs.edit', $program->id)}}" role="button">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection
