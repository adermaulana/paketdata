<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;
use App\Models\Pembayaran;
use RealRashid\SweetAlert\Facades\Alert;

class UserPembayaranController extends Controller
{
    //
    public function index(){

        $userId = auth('pelanggan')->user()->id_user;

        $pembelian = Pembelian::where('id_user', $userId)->get();

        return view('user.pembayaran.index',[
            'pembelian' => $pembelian
        ]);
    }

    public function store(Request $request){

        $auth = auth('pelanggan')->user();

        $validatedData = $request->validate([
            'id_transaksi' => 'required',
            'status_pembayaran' => 'required',
            'bukti_pembayaran' => 'required'
        ]);


        if($request->bukti_pembayaran) {
            $file = $request->bukti_pembayaran->getClientOriginalName();
            $image = $request->bukti_pembayaran->storeAs('barang-images', $file);
            $validatedData['bukti_pembayaran'] = $image;
        }

        $validatedData['id_user'] = $auth->id_user; 

        Pembayaran::create($validatedData);

        $pembelian = Pembelian::find($validatedData['id_transaksi']);
        if ($pembelian) {
            $pembelian->update(['status_paket_transaksi' => 'Proses']);
        }
    

        Alert::success('Sukses', 'Berhasil Mengirim Bukti Pembayaran!');

        return redirect('/user/pembayaran');

    }
}

