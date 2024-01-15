<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class AdminProdukController extends Controller
{
    //
    public function index(){
        return view('admin.produk.index',[
            'produk' => Produk::all()
        ]);
    }

    public function tambah(){
        return view('admin.produk.tambah',[
            'kategori' => Kategori::all()
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'id_kategori' => 'required',
            'deskripsi_barang' => 'required',
            'paket_barang' => 'required',
            'harga_barang' => 'required',
            'stok_barang' => 'required',
            'foto_barang' => 'required'
        ]);

        if($request->foto_barang) {
            $file = $request->foto_barang->getClientOriginalName();
            $image = $request->foto_barang->storeAs('barang-images', $file);
            $validatedData['foto_barang'] = $image;
            
        }

        Produk::create($validatedData);

        Alert::success('Sukses', 'Data berhasil ditambahkan!');

        return redirect('/admin/produk');
    }

    public function edit($id){
        $produk = Produk::find($id);
        return view('admin.produk.edit',[
            'produk' => $produk,
            'kategori' => Kategori::all()
        ]);
    }

    public function update(Request $request,$id){

        $produk = Produk::find($id);

        $validatedData = $request->validate([
            'id_kategori' => 'required',
            'deskripsi_barang' => 'required',
            'paket_barang' => 'required',
            'harga_barang' => 'required',
            'stok_barang' => 'required',
            'foto_barang' => 'required'
        ]);

        if($request->file('foto_barang')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $file = $request->foto_barang->getClientOriginalName();
            $validatedData['foto_barang'] = $request->file('foto_barang')->storeAs('barang-images',$file);
        }

        Produk::where('id_barang',$produk->id_barang)->update($validatedData);

        Alert::success('Sukses', 'Data berhasil diperbarui!');

        return redirect('/admin/produk');
        
    }

    public function destroy($id){

        $delete = Produk::findOrFail($id);

        if($delete->foto_barang){
            Storage::delete($delete->foto_barang);
        }

        Produk::destroy($delete->id_barang);

        Alert::success('Sukses', 'Data berhasil dihapus!');

        return redirect('/admin/produk');

    }
}
