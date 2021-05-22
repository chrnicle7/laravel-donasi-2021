<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefAgama;
use Illuminate\Support\Carbon;

class RefAgamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $agamas = RefAgama::all();

        return view('pages.admin.list-agama', compact('agamas'));
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
        if(isset($request->tambah_nama_agama)){
            $agama = new RefAgama();
            $agama->nama = $request->tambah_nama_agama;

            if($request->tambah_status_agama == "on"){
                $agama->is_active = true;
            }else{
                $agama->is_active = false;
            }

            $agama->inserted_at = Carbon::now();
            $agama->inserted_by = auth()->user()->id;
            $agama->save();

            return redirect()->route('admin.agamas.index')->with(session()->flash('alert-success', 'agama berhasil di tambahkan!'));
        }

        return redirect()->route('admin.agamas.index')->with(session()->flash('alert-warning', 'Nama agama tidak boleh kosong!'));
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
        //
        if(isset($request->nama_agama) && $request->has('form_edit')){
            $agama = RefAgama::find($id);
            $agama->nama = $request->nama_agama;
            if($request->status == "on"){
                $agama->is_active = true;
            }else{
                $agama->is_active = false;
            }
            $agama->edited_at = Carbon::now();
            $agama->edited_by = auth()->user()->id;
            $agama->save();

            return redirect()->route('admin.agamas.index')->with(session()->flash('alert-success', 'Data agama berhasil di ubah'));
        }

        return redirect()->route('admin.agamas.index')->with(session()->flash('alert-danger', 'Nama tidak boleh kosong!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $agama = RefAgama::find($id);
        $agama->delete();

        return redirect()->route('admin.agamas.index')->with(session()->flash('alert-success', 'Agama berhasil di hapus'));
    }
}
