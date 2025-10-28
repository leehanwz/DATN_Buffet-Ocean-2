<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComboBuffet extends Model
{
    protected $table = 'combo_buffet';

    protected $fillable = [
        'ten_combo', 'gia', 'mo_ta'
    ];

    public function monTrongCombos()
    {
        return $this->hasMany(MonTrongCombo::class, 'combo_id');
    }
}