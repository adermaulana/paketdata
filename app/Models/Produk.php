<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'data_barang';
    protected $primaryKey = 'id_barang';
    protected $guarded = ['id_barang'];
    public $timestamps = false;

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

}
