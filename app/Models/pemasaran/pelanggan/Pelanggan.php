<?php

namespace App\Models\pemasaran\pelanggan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table    = "pelanggan";
    protected $fillable = ['id','nama', 'alamat', 'tlp'];
    public $timestamps  = false;
}
