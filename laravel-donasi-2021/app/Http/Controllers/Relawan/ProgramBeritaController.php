<?php

namespace App\Http\Controllers\Relawan;

use App\Http\Controllers\Controller;
use App\Program;
use App\ProgramBerita;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgramBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $program = Program::find($id);
        $beritas = $program->beritas;

        return view('pages.relawan.program-berita', compact('program', 'beritas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $program = Program::find($id);

        return view('pages.relawan.create-berita', compact('program'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tambah_judul_berita' => 'required',
            'tambah_id_program' => 'required',
            'tambah_konten_berita' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->with(session()->flash('alert-warning', 'Data berita tidak lengkap!'));
        }

        $newBerita = new ProgramBerita();
        $newBerita->id_program = $request->tambah_id_program;
        $newBerita->judul = $request->tambah_judul_berita;
        $newBerita->konten_berita = $request->tambah_konten_berita;

        if($request->tambah_status_berita == "on"){
            $newBerita->is_active = true;
        }else{
            $newBerita->is_active = false;
        }

        $timenow = Carbon::now();
        $newBerita->inserted_at = $timenow;
        $newBerita->inserted_by = auth()->user()->id;
        $newBerita->edited_at = $timenow;
        $newBerita->edited_by = auth()->user()->id;
        $newBerita->save();

        return redirect()->route('relawan.program-beritas.index', $newBerita->id_program)->with(session()->flash('alert-success', 'Berita berhasil ditambahkan!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = ProgramBerita::find($id);

        return view('pages.relawan.detail-berita', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = ProgramBerita::find($id);

        return view('pages.relawan.edit-berita', compact('berita'));
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
        $validator = Validator::make($request->all(), [
            'edit_judul_berita' => 'required',
            'edit_id_program' => 'required',
            'edit_konten_berita' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->with(session()->flash('alert-warning', 'Data berita tidak lengkap!'));
        }

        $editBerita = ProgramBerita::find($id);
        $editBerita->judul = $request->edit_judul_berita;
        $editBerita->konten_berita = $request->edit_konten_berita;

        if($request->edit_status_berita == "on"){
            $editBerita->is_active = true;
        }else{
            $editBerita->is_active = false;
        }

        $timenow = Carbon::now();
        $editBerita->edited_at = $timenow;
        $editBerita->edited_by = auth()->user()->id;
        $editBerita->save();

        return redirect()->route('relawan.program-beritas.index', $editBerita->id_program)->with(session()->flash('alert-success', 'Berita berhasil diedit!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = ProgramBerita::find($id);
        $idprogram = $berita->id_program;
        $berita->delete();

        return redirect()->route('relawan.program-beritas.index', $idprogram)->with(session()->flash('alert-success', 'Berita berhasil dihapus!'));
    }
}
