<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPermohonan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function suratKeluar()
    {
        return $this->belongsTo(SuratKeluar::class);
    }
}
