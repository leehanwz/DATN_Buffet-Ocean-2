<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DonHangController extends Controller
{
    public function index()
    {
        return view('admins.don-hang');
    }
}
