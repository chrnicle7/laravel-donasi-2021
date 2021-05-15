<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gate;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('pages.admin.management-user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $userPrevRoleId = $user->roles->pluck('id')->toArray();
        $userPrevRole = Role::find($userPrevRoleId);
        $user->roles()->toggle($userPrevRole);

        $userNewRole = Role::find($request['roles']);
        $user->roles()->attach($userNewRole);

        return redirect()->back()->with(session()->flash('alert-success', 'Data user berhasil diubah'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id==1){
            return redirect()->back()->with(session()->flash('alert-warning', 'Tidak bisa menghapus superuser!'));
        }
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with(session()->flash('alert-success', 'User berhasil di hapus'));
    }
}
