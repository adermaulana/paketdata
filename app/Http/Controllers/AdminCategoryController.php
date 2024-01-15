<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCategoryController extends Controller
{
    //
    public function index(){
        return view('admin.kategori.index',[
            'kategori' => Kategori::all()
        ]);
    }

    public function tambah(){
        return view('admin.kategori.tambah');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'nama_kategori' => 'required'
        ]);

        Kategori::create($validatedData);

        Alert::success('Sukses', 'Data berhasil ditambahkan!');

        return redirect('/admin/kategori');
    }

    public function edit($id){
        $kategori = Kategori::find($id);
        return view('admin.kategori.edit',[
            'kategori' => $kategori
        ]);
    }

    public function update(Request $request,$id){

        $kategori = Kategori::find($id);

        $validatedData = $request->validate([
            'nama_kategori' => 'required'
        ]);

        Kategori::where('id_kategori',$kategori->id_kategori)->update($validatedData);

        Alert::success('Sukses', 'Data berhasil diperbarui!');

        return redirect('/admin/kategori');
        
    }

    public function destroy($id){
        $delete = Kategori::findOrFail($id);
        Kategori::destroy($delete->id_kategori);

        Alert::success('Sukses', 'Data berhasil dihapus!');

        return redirect('/admin/kategori');

    }
}
