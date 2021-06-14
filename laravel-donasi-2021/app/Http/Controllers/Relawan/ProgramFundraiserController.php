<?php

namespace App\Http\Controllers\Relawan;

use App\Http\Controllers\Controller;
use App\User;
use App\Program;
use App\ProgramFundraiser;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class ProgramFundraiserController extends Controller
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
        if(isset($request->idprogram) && isset($request->idfundraiser)){
            $programFundraiser = new ProgramFundraiser();
            $programFundraiser->id_program = $request->idprogram;
            $programFundraiser->id_user = $request->idfundraiser;
            $timenow = Carbon::now();
            $usernow = auth()->user()->id;
            $programFundraiser->inserted_at = $timenow;
            $programFundraiser->inserted_by = $usernow;
            $programFundraiser->edited_at = $timenow;
            $programFundraiser->edited_by = $usernow;
            $programFundraiser->save();

            return redirect()->route('relawan.program-fundraisers.show', $request->idprogram)->with(session()->flash('alert-success', 'Fundraiser berhasil ditambahkan!'));
        }

        return redirect()->route('relawan.program-fundraisers.show', $request->idprogram)->with(session()->flash('alert-danger', 'Terdapat kesalahan!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idprogram)
    {
        //
        $programTitle = Program::find($idprogram)->nama_program;
        $progFunds = ProgramFundraiser::where('id_program', $idprogram)->get();

        return view('pages.relawan.program-fundraisers', compact('progFunds', 'idprogram', 'programTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idprogram)
    {
        //
        $fundraiserFound = null;
        $programTitle = Program::find($idprogram)->nama_program;

        return view('pages.relawan.add-program-fundraisers', compact('idprogram', 'fundraiserFound', 'programTitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idprogram)
    {
        //
        if(isset($request->search_email_fund)){
            $fundraiserFound = User::whereHas('roles', function (Builder $query) {
                $query->where('name', 'fundraiser');
            })->where('email', $request->search_email_fund)->first();

            if($fundraiserFound){
                $programTitle = Program::find($idprogram)->nama_program;
                return view('pages.relawan.add-program-fundraisers', compact('idprogram', 'fundraiserFound', 'programTitle'));
            }else{
                return redirect()->back()->with(session()->flash('alert-danger', 'Fundraiser tidak ditemukan'));
            }
        }

        return redirect()->back()->with(session()->flash('alert-warning', 'Masukkan nama email!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $progFund = ProgramFundraiser::find($id);
        $progFund->delete();

        return redirect()->back()->with(session()->flash('alert-success', 'Fundraiser berhasil dihapus!'));
    }
}
