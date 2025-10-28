<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonTrongCombo extends Model
{
    protected $table = 'mon_trong_combo';

    protected $fillable = [
        'combo_id', 'mon_id'
    ];

    public function combo()
    {
        return $this->belongsTo(ComboBuffet::class, 'combo_id');
    }

    public function mon()
    {
        return $this->belongsTo(Mon::class, 'mon_id');
    }
}