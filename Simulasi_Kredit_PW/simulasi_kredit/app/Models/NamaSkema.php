<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaSkema extends Model
{
    use HasFactory;

    protected $table = 'nama_skema' ;
    // $fillable = [ 'nama', 'is_active'];

    // public function idnamaskema() {
    //     return $this->hasMany(Banks::class);
    //   }
}
