<?php

namespace App\Models\pergudangan\barang_out;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang_out extends Model
{
    use HasFactory;
    protected $table    = "barang_out";
    protected $fillable = ['tcodeout', 'bcode', 'qty', 'tanggal'];
    public $timestamps  = false;
}
