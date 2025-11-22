<?php

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use App\Models\OrderMon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BepController extends Controller
{
    public function index()
    {
        $orders = Cache::get('orders_gui_bep', []); // lấy mảng
        $orders = collect($orders); // chuyển sang Collection
        return view('bep.index', compact('orders'));
    }
}
