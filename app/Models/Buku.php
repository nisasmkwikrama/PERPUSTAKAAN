<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $fillable = [
    'judul',
    'penulis',
    'jumlah_halaman',
    'jenis'
    ];
    protected $table = 'buku';
}
