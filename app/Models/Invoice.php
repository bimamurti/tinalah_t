<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'noinvoice',
        'namacust',
        'orgcust',
        'hpcust',
        'emailcust',
        'jenispaket',
        'User',
        'jenis paket',
        'waktu_ambil',
        'waktu_selesai',
        'hargafinal',
        'jumlahpembayaran',
        'buktibayar',
        'keteranganinvoice',
        'keteranganpembayaran',
        'waktu_pembayaran',
        'waktu_konfirm',
    ];
}
