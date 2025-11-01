<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';
    protected $primaryKey = 'kode_post';
    public $timestamps = false;

    protected $fillable = [
        'nama_post',
        'det_post',
        'srn_post',
        'gambar',
    ];
}
