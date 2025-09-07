<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DropPoint extends Model
{
    use HasFactory;

    // Daftar kolom yang dapat diisi massal
    protected $fillable = [
        'nama_lokasi',
        'alamat',
        'koordinat',
        // tambahkan kolom lain sesuai tabel drop_points
    ];
}
