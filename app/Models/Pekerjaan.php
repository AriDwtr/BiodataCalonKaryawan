<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;
    protected $table = 'riwayat_pekerjaan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'perusahaan',
        'posisi_terakhir',
        'pendapatan_terakhir',
        'tahun_perusahaan',
    ];
}
