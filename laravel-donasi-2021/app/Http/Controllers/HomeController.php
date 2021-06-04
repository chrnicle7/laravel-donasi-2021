<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\ProgramDonatur;
use App\RefVendorSaving;
use App\Rekening;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $programs = Program::orderBy('batas_akhir', 'ASC')->get();

        return view('pages.umum.home', compact('programs'));
    }

    public function show($id)
    {
        $program = Program::find($id);
        $vendors = RefVendorSaving::all();

        return view('pages.umum.detail-donasi', compact('program', 'vendors'));
    }

    public function kirimDonasi(Request $request, $id){
        $program = Program::find($id);

        if(isset($request->donatur_nominal_donasi) && isset($request->donatur_vendor_rekening)
            && isset($request->donatur_rekening) && (isset($request->donatur_nama_pengirim))
            && isset($request->donatur_atas_nama) && isset($request->donatur_email)){
                $rekening = Rekening::where('nomor_rekening', '=', $request->donatur_rekening)->first();
                if($rekening == null){
                    $rekening = new Rekening();
                    $rekening->id_vendor = $request->donatur_vendor_rekening;
                    $rekening->nama_rekening = $request->donatur_nama_pengirim;
                    $rekening->nomor_rekening = $request->donatur_rekening;
                    $rekening->is_active = true;
                    $rekening->inserted_at = Carbon::now();
                    $rekening->inserted_by = 1;
                    $rekening->save();
                }
                $programDonatur = new ProgramDonatur();
                $programDonatur->id_program = $program->id;
                $programDonatur->nominal_donasi = $request->donatur_nominal_donasi;
                $programDonatur->id_rekening = $rekening->id;
                $programDonatur->nama_pengirim = $request->donatur_nama_pengirim;
                $programDonatur->no_rekening_pengirim = $rekening->nomor_rekening;
                $programDonatur->atas_nama = $request->donatur_atas_nama;
                $programDonatur->email = $request->donatur_email;
                $programDonatur->pesan = $request->donatur_pesan;
                $programDonatur->status_verifikasi = "menunggu verifikasi";
                $programDonatur->status_donasi = "proses penghimpunan";
                $programDonatur->inserted_at = Carbon::now();
                $programDonatur->inserted_by = 1;
                $programDonatur->edited_at = Carbon::now();
                $programDonatur->edited_by = 1;
                $programDonatur->save();

                $program->jumlah_terkumpul += $programDonatur->nominal_donasi;
                $program->save();

                return redirect()->route('detail_donasi', $program->id)->with(session()->flash('alert-success', 'Terima kasih, donasi Anda akan segera disalurkan'));
        }else{
            return redirect()->route('detail_donasi', $program->id)->with(session()->flash('alert-warning', 'Maaf, data Anda kurang lengkap'));
        }
    }
}
