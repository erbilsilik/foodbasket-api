<?php

namespace App\Http\Controllers\MasterAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function homeIndex() {
        return view('MasterAdmin/Pages/HomePage');
    }
}
