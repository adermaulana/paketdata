<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelanggan;
use App\Models\Pembelian;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'data_pembayaran';
    protected $primaryKey = 'id_pembayaran';
    protected $guarded = ['id_pembayaran'];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(Pelanggan::class, 'id_user');
    }

    public function transaksi(){
        return $this->belongsTo(Pembelian::class,'id_transaksi');
    }

}
