<?php

namespace App\Models\pemasaran\barang_dikirim;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang_dikirim extends Model
{
    use HasFactory;
    protected $table    = "barang_dikirim";
    protected $fillable = ['koderesi', 'tcodeout', 'id_pelanggan', 'id_kurir', 'tanggal_dikirim'];
    public $timestamps  = false;
}
