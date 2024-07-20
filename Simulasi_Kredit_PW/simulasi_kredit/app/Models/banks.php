<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banks extends Model
{
    protected $fillable = [ 'nama_bank','presentase_bunga', 'is_active'];

    // public function idnamaskemas() {
    //     return $this->belongsTo(NamaSkema::class);
    //   }

    public function jangkaWaktuses()
    {
        return $this->hasMany(JangkaWaktus::class, 'id_bank', 'id');
    }

}
