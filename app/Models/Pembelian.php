<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'data_transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $guarded = ['id_transaksi'];
    public $timestamps = false;

    public function barang(){
        return $this->belongsTo(Produk::class,'id_barang');
    }
}
