<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan'; // Sesuaikan nama tabel jika tidak menggunakan konvensi Laravel

    protected $fillable = [
        'tanggal_transaksi',
        'namacustomer',
        'pesanan',
        'outlet',
        'jumlah',
        'transaksi',
        'admin'
        // Tambahkan properti lain yang sesuai dengan kebutuhan Anda
    ];

    // Contoh relasi dengan model Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id','customer_id');
    }

    // Contoh accessor untuk format tanggal transaksi
    public function getTanggalTransaksiAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }

    // Contoh mutator untuk format jumlah transaksi
    public function setTransaksiAttribute($value)
    {
        $this->attributes['transaksi'] = 'Rp. ' . $value;
    }
}
