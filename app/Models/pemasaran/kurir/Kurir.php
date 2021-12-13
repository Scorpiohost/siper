<?php

namespace App\Models\pemasaran\kurir;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurir extends Model
{
    use HasFactory;
    protected $table    = "kurir";
    protected $fillable = ['id', 'kurir'];
    public $timestamps  = false;
}
