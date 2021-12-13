<?php

namespace App\Models\pergudangan\barang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table    = "barang";
    protected $fillable = ['bcode', 'nama', 'id_jenis', 'stok'];
    public $timestamps  = false;
}
