<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_kategori';
    protected $table = 'data_kategori';
    public $timestamps = false;
    protected $guarded = ['id_kategori'];
}
