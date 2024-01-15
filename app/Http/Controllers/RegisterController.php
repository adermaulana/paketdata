<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Pelanggan;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    //

    public function index() {

        return view('register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request) {

        $validateData = $request->validate([
            'namalengkap_user' => 'required',
            'username' => 'required',
            'telpon_user' => 'required',
            'password' => 'required|min:6|max:13|confirmed',
            'foto_user' => 'required'
        ]);

        
        if($request->foto_user) {
            $file = $request->foto_user->getClientOriginalName();
            $image = $request->foto_user->storeAs('barang-images', $file);
            $validateData['foto_user'] = $image;
        }
        
        $validateData['password'] = Hash::make($validateData['password']);

        Pelanggan::create($validateData);

        // $request->session()->flash('success','Registration successfull! please Login');
        Alert::success('Sukses', 'Berhasil Registrasi!');

        return redirect('/login')->with('success','Registration successfull! Please login');

    }
}
