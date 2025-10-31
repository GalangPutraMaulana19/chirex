<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilDiagnosa extends Model
{
    use HasFactory;

    protected $table = 'hasil_diagnosa';
    protected $primaryKey = 'kode_diagnosa';
    public $timestamps = false;

    protected $fillable = [
        'kode_penyakit',
        'gejala_dipilih',
        'hasil_nilai',
        'nama_user',
        'tanggal',
    ];

    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'kode_penyakit');
    }
}
