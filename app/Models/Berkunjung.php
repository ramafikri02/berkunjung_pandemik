<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkunjung extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'absen',
        'kelas',
        'jurusan',
        'tgl_berkunjung',
        'jam_berkunjung',
        'keperluan',
        'kondisi',
    ];
}
