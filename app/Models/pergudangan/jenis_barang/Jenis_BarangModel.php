<?php

namespace App\Models\pergudangan\jenis_barang;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_BarangModel extends Model
{
    //use HasFactory;

    protected $table    = "jenis_barang";
    protected $fillable = ['jenis'];
    public $timestamps  = false;
}
