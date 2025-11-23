<?php

namespace App\Http\Controllers\Shop\NhanVien;

use App\Http\Controllers\Controller;
use App\Models\BanAn;

class NVBanAnController extends Controller
{
    public function index()
    {
        $bans = BanAn::orderBy('so_ban')->get();
        return view('nhanvien.ban.index', compact('bans'));
    }

    public function show($id)
    {
        $ban = BanAn::findOrFail($id);
        return view('nhanvien.ban.show', compact('ban'));
    }
}
