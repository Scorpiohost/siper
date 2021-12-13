<?php

namespace App\Models\pergudangan\barang_in;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang_in extends Model
{
    use HasFactory;
    
    protected $table    = "barang_in";
    protected $fillable = ['tcodein', 'bcode', 'qty', 'tanggal'];
    public $timestamps  = false;
}
