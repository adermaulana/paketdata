<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use RealRashid\SweetAlert\Facades\Alert;

class AdminPembelianController extends Controller
{
    //
    public function index(){
        return view('admin.pembelian.index',[
            'pembelian' => Pembayaran::all()
        ]);
    }
}
