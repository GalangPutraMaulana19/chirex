<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasisPengetahuan extends Model
{
    use HasFactory;

    protected $table = 'basis_pengetahuan';
    protected $primaryKey = 'kode_pengetahuan';
    public $timestamps = false;

    protected $fillable = [
        'kode_penyakit',
        'kode_gejala',
        'mb',
        'md',
    ];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'kode_penyakit');
    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'kode_gejala');
    }
}
