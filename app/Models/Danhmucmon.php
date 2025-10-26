<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmucmon extends Model
{
    use HasFactory;

    protected $table = 'danh_muc_mon';

    protected $fillable = [
        'ten_danh_muc',
        'mo_ta',
        'hien_thi',
    ];

}
