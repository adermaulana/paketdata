<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    //
    public function index(){
        return view('admin.user.index',[
            'pelanggan' => Pelanggan::all()
        ]);
    }

    public function destroy($id){

        $delete = Pelanggan::findOrFail($id);

        if($delete->foto_user){
            Storage::delete($delete->foto_user);
        }

        Pelanggan::destroy($delete->id_user);

        Alert::success('Sukses', 'Data berhasil dihapus!');

        return redirect('/admin/user');

    }
}
