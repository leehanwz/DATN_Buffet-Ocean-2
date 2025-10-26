<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonAnRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'ten_mon' => 'required|string|max:255',
            'danh_muc_id' => 'required|exists:danh_muc_mon,id',
            'gia' => 'required|numeric',
            'mo_ta' => 'nullable|string',
            'trang_thai' => 'required|boolean',
            'thoi_gian_che_bien' => 'nullable|string|max:255',
            'loai_mon' => 'nullable|string|max:255',
            'hinh_anh' => 'nullable|image|max:2048',
        ];
    }
}
