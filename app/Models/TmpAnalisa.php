<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmpAnalisa extends Model
{
    use HasFactory;

    protected $table = 'tmp_analisa';
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'kode_pengetahuan',
        'kode_gejala',
        'kode_penyakit',
        'session',
        'nilai_cf',
    ];
}
