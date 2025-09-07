<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'drop_point_id',
        'jenis_sampah',
        'berat',
        'poin',
        // kolom lain jika ada
    ];

    // Casting kolom ke tipe date/datetime supaya bisa pakai format()
    protected $casts = [
        'tanggal' => 'datetime',
    ];

    public function dropPoint()
    {
        return $this->belongsTo(DropPoint::class);
    }
}
