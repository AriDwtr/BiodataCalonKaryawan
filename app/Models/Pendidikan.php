<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table = 'pendidikan_terakhir';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'jenjang',
        'institusi',
        'jurusan',
        'tahun_pendidikan',
        'ipk',
    ];
}
