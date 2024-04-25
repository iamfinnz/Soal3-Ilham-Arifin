<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    public $timestamps = false;
    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'kode_barang', 'nama_barang', 'kategori', 'stok', 'harga', 'gambar'
    ];
}
