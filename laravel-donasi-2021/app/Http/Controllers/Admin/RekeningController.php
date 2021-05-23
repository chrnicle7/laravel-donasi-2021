<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rekening;
use App\RefVendorSaving;
use Illuminate\Support\Carbon;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rekenings = Rekening::orderBy('id', 'ASC')->get();
        $vendors = RefVendorSaving::orderBy('id', 'ASC')->get();

        return view('pages.admin.list-rekening', compact('vendors', 'rekenings'));
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
        if(isset($request->tambah_nama_rekening) && isset($request->tambah_vendor_rekening) && isset($request->tambah_nomor_rekening)){
            $rekening = new Rekening();
            $rekening->id_vendor = $request->tambah_vendor_rekening;
            $rekening->nama_rekening = $request->tambah_nama_rekening;
            $rekening->nomor_rekening = $request->tambah_nomor_rekening;

            if($request->tambah_status_rekening == "on"){
                $rekening->is_active = true;
            }else{
                $rekening->is_active = false;
            }

            $rekening->inserted_at = Carbon::now();
            $rekening->inserted_by = auth()->user()->id;
            $rekening->save();

            return redirect()->route('admin.rekenings.index')->with(session()->flash('alert-success', 'rekening berhasil di tambahkan!'));
        }

        return redirect()->route('admin.rekenings.index')->with(session()->flash('alert-warning', 'Data rekening tidak boleh kosong!'));
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
        if($request->has('form_edit')){
            $rekening = Rekening::find($id);
            $rekening->id_vendor = $request->vendor_rekening;
            $rekening->nama_rekening = $request->nama_rekening;
            $rekening->nomor_rekening = $request->nomor_rekening;

            if($request->status == "on"){
                $rekening->is_active = true;
            }else{
                $rekening->is_active = false;
            }
            $rekening->edited_at = Carbon::now();
            $rekening->edited_by = auth()->user()->id;
            $rekening->save();

            return redirect()->route('admin.rekenings.index')->with(session()->flash('alert-success', 'Data rekening berhasil di ubah'));
        }

        return redirect()->route('admin.rekenings.index')->with(session()->flash('alert-danger', 'Data tidak boleh kosong!'));
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
        $rekening = Rekening::find($id);
        $rekening->delete();

        return redirect()->route('admin.rekenings.index')->with(session()->flash('alert-success', 'Rekening berhasil di hapus'));
    }
}
