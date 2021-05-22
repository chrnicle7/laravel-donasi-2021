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

}
