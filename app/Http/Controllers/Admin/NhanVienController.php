<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class NhanVienController extends Controller
{
    public function index()
    {
        return view('admins.nhan-vien');
    }
}
