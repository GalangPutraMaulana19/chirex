<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = 'penyakit';
    protected $primaryKey = 'kode_penyakit';
    public $timestamps = false;

    protected $fillable = [
        'nama_penyakit',
        'det_penyakit',
        'srn_penyakit',
        'gambar',
    ];

    public function basisPengetahuan()
    {
        return $this->hasMany(BasisPengetahuan::class, 'kode_penyakit');
    }

    public function hasilDiagnosa()
    {
        return $this->hasMany(HasilDiagnosa::class, 'kode_penyakit');
    }
}
