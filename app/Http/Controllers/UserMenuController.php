<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Pembelian;
use RealRashid\SweetAlert\Facades\Alert;


class UserMenuController extends Controller
{
    //
    public function index(){

            // Mengambil data kategori
            $kategori = Kategori::orderBy('id_kategori', 'desc')->get();

            // Mengambil produk berdasarkan id_kategori yang terkait
            $produk = Produk::whereIn('id_kategori', $kategori->pluck('id_kategori'))->get();

        return view('user.menu.index',[
            'allkategori' => $kategori,
            'kategori' => $kategori,
            'produk' => $produk
        ]);
    }

    public function cari(Request $request) {
        $idKategori = $request->input('id_kategori');
    
        // Retrieve the selected category
        $selectedCategory = Kategori::find($idKategori);
    
        // Check if the category exists
        if ($selectedCategory) {
            // Retrieve products for the selected category
            $produk = Produk::where('id_kategori', $selectedCategory->id_kategori)->get();
            $allkategori = Kategori::orderBy('id_kategori','desc')->get();
            // Pass the selected category and products to the view
            return view('user.menu.index', [
                'allkategori' => $allkategori,
                'kategori' => [$selectedCategory], // Pass the selected category as an array
                'produk' => $produk,
            ]);
        } else {
            // Handle the case when the selected category does not exist
            return view('user.menu.index', [
                'kategori' => [], // Pass an empty array
                'produk' => [],
            ]);
        }
    }

    public function store(Request $request){

        $auth = auth('pelanggan')->user();

        $validatedData = $request->validate([
            'id_barang' => 'required',
            'tgl_transaksi' => 'required',
            'harga_paket_transaksi' => 'required',
            'status_paket_transaksi' => 'required'
        ]);

        $validatedData['id_user'] = $auth->id_user;

        $pembelian = Pembelian::create($validatedData);
        $produk = Produk::find($request->id_barang);
        $produk->stok_barang -= 1; // Misalnya, asumsikan setiap pembelian mengurangi stok sebanyak satu
        $produk->save();

        Alert::success('Sukses', 'Berhasil Membeli Produk!');

        return redirect('/user/pembayaran');

    }
}
