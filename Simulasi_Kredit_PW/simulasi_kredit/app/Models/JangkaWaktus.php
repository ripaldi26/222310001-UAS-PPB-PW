<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JangkaWaktus extends Model
{
    protected $fillable = [ 'id_bank','batas_awal','batas_akhir', 'rentang_waktu', 'is_active'];

    public function bank()
    {
        return $this->belongsTo(banks::class, 'id_bank', 'id');
    }
}
