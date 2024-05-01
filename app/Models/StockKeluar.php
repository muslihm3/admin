<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Stock; // Tambahkan baris ini untuk mengimpor kelas Stock


class StockKeluar extends Model
{
    protected $table = 'keluar'; // Nama tabel di database

    protected $fillable = [
        'idbarang',
        'tanggal',
        'qty',
        'petugas',
    ];

    protected $dates = [
        'tanggal', // Menyatakan bahwa kolom 'tanggal' adalah tipe data Carbon/DateTime
    ];

    // Definisikan relasi dengan model Stock
    public function stock()
    {
        return $this->belongsTo(Stock::class, 'idbarang', 'idbarang');

    }
}
