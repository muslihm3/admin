<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMasuk extends Model
{
    use HasFactory;

    protected $table = 'masuk';

    protected $fillable = [
        'idbarang',
        'qty',
        'total',
        'image',
        'tanggal',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'datetime', // Mengonversi kolom tanggal ke tipe data datetime
    ];
}
