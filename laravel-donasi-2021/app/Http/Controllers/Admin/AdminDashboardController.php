<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\RefProfesi;
use PDO;
use Illuminate\Support\Carbon;

class AdminDashboardController extends Controller
{
    //
    public function index()
    {
        return view('pages.admin.index');
    }

    public function listProfesi()
    {
        $profesis = RefProfesi::orderBy('id', 'ASC')->get();

        return view('pages.admin.list-profesi', compact('profesis'));
    }

    public function updateNamaProfesi(Request $request, $id)
    {
        if(isset($request->nama_profesi) && $request->has('form_edit')){
            $profesi = RefProfesi::find($id);
            $profesi->nama = $request->nama_profesi;
            if($request->status == "on"){
                $profesi->is_active = true;
            }else{
                $profesi->is_active = false;
            }
            $profesi->save();

            return redirect()->route('admin.list_profesi')->with(session()->flash('alert-success', 'Data profesi berhasil di ubah'));
        }

        return redirect()->route('admin.list_profesi')->with(session()->flash('alert-danger', 'Nama tidak boleh kosong!'));
    }

    public function destroyProfesi($id)
    {
        $profesi = RefProfesi::find($id);
        $profesi->delete();

        return redirect()->route('admin.list_profesi')->with(session()->flash('alert-success', 'Profesi berhasil di hapus'));
    }

    public function storeProfesi(Request $request){

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

            return redirect()->route('admin.list_profesi')->with(session()->flash('alert-success', 'Profesi berhasil di tambahkan!'));
        }

        return redirect()->route('admin.list_profesi')->with(session()->flash('alert-warning', 'Nama profesi tidak boleh kosong!'));
    }
}
