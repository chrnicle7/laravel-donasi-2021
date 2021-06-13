@extends('layouts.master')
@section('tableId', '#users')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manajemen User</h3>
                    <p class="text-subtitle text-muted"></p>
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
            {{-- Card Manajemen User --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Daftar User</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="users">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-center">{{$user->id}}</td>
                                    <td>@foreach ($user->roles as $role)
                                        {{$role->name}},
                                    @endforeach</td>
                                    <td >{{$user->nama}}</td>
                                    <td >{{$user->email}}</td>
                                    <td  class="text-center">
                                        @if($user->is_verified)
                                        <span class="badge bg-success">Terverifikasi</span>
                                        @else
                                        <span class="badge bg-danger">Belum Terferivikasi</span>
                                        @endif
                                    </td>
                                    {{-- Menu Edit --}}
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm btn-warning "data-bs-toggle="modal"
                                            data-bs-target="#user_edit_{{$user->id}}">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        {{-- Menu Delete --}}
                                        <button type="button" class="btn btn-sm btn-danger "data-bs-toggle="modal"
                                            data-bs-target="#user_destroy_{{$user->id}}">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>

                                    {{-- Modal Untuk Edit --}}
                                    <div class="modal fade text-left" id="user_edit_{{$user->id}}" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel33">{{$user->nama}}</h4>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form action="{{route('admin.users.update', $user->id)}}" method="POST">
                                                    @method('PATCH')
                                                    @csrf
                                                    <div class="modal-body mx-4">
                                                        <label class="my-2">Role:</label>
                                                        <div class="form-group">
                                                            <div class="form-check">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox"
                                                                        class="form-check-input form-check-primary form-check-glow" value="1"
                                                                        name="roles[]" id="customColorCheck1" {{(in_array(1, $user->roles->pluck('id')->toArray())) ? 'checked' : ''}}>
                                                                    <label class="form-check-label"
                                                                        for="customColorCheck2">Admin</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-check">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox"
                                                                        class="form-check-input form-check-primary form-check-glow" value="2"
                                                                        name="roles[]" id="customColorCheck2" {{(in_array(2, $user->roles->pluck('id')->toArray())) ? 'checked' : ''}}>
                                                                    <label class="form-check-label"
                                                                        for="customColorCheck2">Relawan</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-check">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox"
                                                                        class="form-check-input form-check-primary form-check-glow" value="3"
                                                                        name="roles[]" id="customColorCheck3" {{(in_array(3, $user->roles->pluck('id')->toArray())) ? 'checked' : ''}}>
                                                                    <label class="form-check-label"
                                                                        for="customColorCheck2">Fundraiser</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Close</span>
                                                        </button>
                                                        <button type="submit" class="btn btn-primary ml-1">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Edit</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Modal Delete --}}
                                    <div class="modal fade text-left" id="user_destroy_{{$user->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="$user_dest_ttl_{{$user->id}}">Apakah Anda yakin untuk menghapus user {{$user->nama}}?</h5>
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
                                                    <form action="{{route('admin.users.destroy', $user->id)}}" method="POST">
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@stop
