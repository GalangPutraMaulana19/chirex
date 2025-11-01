<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $table = 'gejala';
    protected $primaryKey = 'kode_gejala';
    public $timestamps = false;

    protected $fillable = [
        'nama_gejala',
    ];

    public function basisPengetahuan()
    {
        return $this->hasMany(BasisPengetahuan::class, 'kode_gejala');
    }
}
