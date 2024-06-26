<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Stock; // Import kelas Stock

class StockMasuk extends Model
{
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

    // Definisikan relasi dengan model Stock
    public function stock()
    {
        return $this->belongsTo(Stock::class, 'idbarang', 'idbarang');
    }
}
