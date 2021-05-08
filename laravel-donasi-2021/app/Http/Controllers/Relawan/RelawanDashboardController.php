<?php

namespace App\Http\Controllers\Relawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RelawanDashboardController extends Controller
{
    //
    public function index(){
        return view('relawan.index');
    }
}
