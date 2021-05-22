<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefVendorSaving;
use Illuminate\Support\Carbon;

class RefVendorSavingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
       $vendors = RefVendorSaving::orderBy('id', 'ASC')->get();

       return view('pages.admin.list-vendor_saving', compact('vendors'));
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
        if(isset($request->tambah_nama_vendor)){
            $vendor = new RefVendorSaving();
            $vendor->nama = $request->tambah_nama_vendor;
            $vendor->inserted_at = Carbon::now();
            $vendor->inserted_by = auth()->user()->id;
            $vendor->save();

            return redirect()->route('admin.vendors.index')->with(session()->flash('alert-success', 'Vendor berhasil di tambahkan!'));
        }

        return redirect()->route('admin.vendors.index')->with(session()->flash('alert-warning', 'Nama vendor tidak boleh kosong!'));
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
        if(isset($request->nama_vendor) && $request->has('form_edit')){
            $vendor = RefVendorSaving::find($id);
            $vendor->nama = $request->nama_vendor;
            $vendor->edited_at = Carbon::now();
            $vendor->edited_by = auth()->user()->id;
            $vendor->save();

            return redirect()->route('admin.vendors.index')->with(session()->flash('alert-success', 'Data vendor berhasil di ubah'));
        }

        return redirect()->route('admin.vendors.index')->with(session()->flash('alert-danger', 'Nama tidak boleh kosong!'));
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
        $vendor = RefVendorSaving::find($id);
        $vendor->delete();

        return redirect()->route('admin.vendors.index')->with(session()->flash('alert-success', 'Vendor berhasil di hapus'));
    }
}
