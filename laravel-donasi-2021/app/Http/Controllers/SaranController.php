<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Saran;
use Carbon\Carbon;

class SaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.umum.create-saran');
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
            'nama' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'subyek' => 'required',
            'konten' => 'required',
            'captcha' => 'required|captcha'
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->with(session()->flash('alert-warning', 'Form kosong atau captcha tidak benar!'));
        }

        $timenow = Carbon::now();
        $saranBaru = new Saran();
        $saranBaru->nama = $request->nama;
        $saranBaru->email = $request->email;
        $saranBaru->no_hp = $request->no_hp;
        $saranBaru->subyek = $request->subyek;
        $saranBaru->konten = $request->konten;
        $saranBaru->inserted_at = $timenow;
        $saranBaru->inserted_by = 1;
        $saranBaru->edited_at = $timenow;
        $saranBaru->edited_by = 1;
        $saranBaru->save();

        return redirect()->route('create_saran_umum')->with(session()->flash('alert-success', 'Saran berhasil dikirim!'));
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

    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
