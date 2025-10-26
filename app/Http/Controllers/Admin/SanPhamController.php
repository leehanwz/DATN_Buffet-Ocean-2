<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SanPhamController extends Controller
{
    public function index()
    {
        return view('admins.san-pham.san-pham');
    }

    public function create()
    {
        return view('admins.san-pham.form-add-san-pham');
    }

    public function store()
    {
        // sau này thêm logic lưu sản phẩm vào DB
    }
}
