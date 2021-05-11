<?php

namespace App\Http\Controllers\Fundraiser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FundraiserDashboardController extends Controller
{
    //
    public function index(){
        return view('pages.fundraiser.index');
    }
}
