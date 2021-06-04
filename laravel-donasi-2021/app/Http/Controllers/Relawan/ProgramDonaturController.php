<?php

namespace App\Http\Controllers\Relawan;

use App\Http\Controllers\Controller;
use App\Program;
use App\ProgramDonatur;
use Illuminate\Http\Request;

class ProgramDonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $program = Program::find($id);
        $donaturs = ProgramDonatur::where('id_program', $program->id)->orderBy('id', 'ASC')->get();
        $jmlTerverifikasi = $donaturs->where('status_verifikasi', 'terverifikasi')->count();
        $jmlDitolak = $donaturs->where('status_verifikasi', 'ditolak')->count();
        $jmlMenunggu = $donaturs->where('status_verifikasi', 'menunggu verifikasi')->count();

        return view('pages.relawan.program-donaturs', compact('program', 'donaturs', 'jmlTerverifikasi', 'jmlDitolak', 'jmlMenunggu'));
    }

    /**
     * Show the form for editing the specified resource.

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
        $donatur = ProgramDonatur::find($id);
        $donatur->status_verifikasi = $request->change_status_verifikasi;
        $donatur->status_donasi = $request->change_status_donasi;
        $donatur->save();

        if ($donatur->status_verifikasi == "terverifikasi"){
            $program = Program::where('id', $donatur->id_program)->first();
            $program->jumlah_terverifikasi += $donatur->nominal_donasi;
            $program->save();
        }

        return redirect()->route('relawan.program-donaturs.show', $donatur->program->id)->with(session()->flash('alert-success', 'Data donatur berhasil diubah'));
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
    }
}
