<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefProfesi;
use Illuminate\Support\Carbon;

class RefProfesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profesis = RefProfesi::orderBy('id', 'ASC')->get();

        return view('pages.admin.list-profesi', compact('profesis'));
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
        if(isset($request->tambah_nama_profesi)){
            $profesi = new RefProfesi();
            $profesi->nama = $request->tambah_nama_profesi;

            if($request->tambah_status_profesi == "on"){
                $profesi->is_active = true;
            }else{
                $profesi->is_active = false;
            }

            $profesi->inserted_at = Carbon::now();
            $profesi->inserted_by = auth()->user()->id;
            $profesi->save();

            return redirect()->route('admin.profesis.index')->with(session()->flash('alert-success', 'Profesi berhasil di tambahkan!'));
        }

        return redirect()->route('admin.profesis.index')->with(session()->flash('alert-warning', 'Nama profesi tidak boleh kosong!'));
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
        if(isset($request->nama_profesi) && $request->has('form_edit')){
            $profesi = RefProfesi::find($id);
            $profesi->nama = $request->nama_profesi;
            if($request->status == "on"){
                $profesi->is_active = true;
            }else{
                $profesi->is_active = false;
            }
            $profesi->edited_at = Carbon::now();
            $profesi->edited_by = auth()->user()->id;
            $profesi->save();

            return redirect()->route('admin.profesis.index')->with(session()->flash('alert-success', 'Data profesi berhasil di ubah'));
        }

        return redirect()->route('admin.profesis.index')->with(session()->flash('alert-danger', 'Nama tidak boleh kosong!'));
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
        $profesi = RefProfesi::find($id);
        $profesi->delete();

        return redirect()->route('admin.profesis.index')->with(session()->flash('alert-success', 'Profesi berhasil di hapus'));
    }
}
