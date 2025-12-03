<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\KhuVuc;
use App\Models\MonAn;
use App\Models\ComboBuffet;

class HomeController extends Controller
{
    public function index()
    {
        try {
            // 1. SỬA LẠI: Lấy món có trạng thái là 'con' (chữ thường, không phải số 1)
            $mon_an_list = MonAn::where('trang_thai', 'con') 
                                ->orderBy('id', 'desc')
                                ->limit(6)
                                ->get();

            // 2. Lấy danh sách Cơ sở
            $khu_vuc_list = KhuVuc::select('id', 'ten_khu_vuc', 'mo_ta', 'tang')
                                ->get();

            // 3. Lấy danh sách Combo
            $combo_list = ComboBuffet::where('trang_thai', 'dang_ban')
                                ->limit(3)
                                ->get();

        } catch (\Exception $e) {
            // Nếu lỗi, trả về mảng rỗng để không chết trang
            $mon_an_list = collect([]);
            $khu_vuc_list = collect([]);
            $combo_list = collect([]);
        }

        return view('layouts.restaurants.layout-shop', compact('mon_an_list', 'khu_vuc_list', 'combo_list'));
    }
}