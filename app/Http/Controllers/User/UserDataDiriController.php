<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use App\Models\Pelatihan;
use App\Models\Pendidikan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDataDiriController extends Controller
{
    public function index()
    {
        $data = User::find(Auth::user()->id);
        $pendidikan = Pendidikan::Where('id_user', Auth::user()->id)->get();
        $pelatihan = Pelatihan::Where('id_user', Auth::user()->id)->get();
        $pekerjaan = Pekerjaan::Where('id_user', Auth::user()->id)->get();
        return view('user.data_diri.datadiri', compact('data','pendidikan','pelatihan','pekerjaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'posisi'=>'required',
            'ktp'=>'required|numeric',
            'nama'=>'required',
            'email'=>'required|email',
            'tempat_lahir'=>'required',
            'tanggal_lahir'=>'required',
            'alamat_ktp'=>'required',
            'alamat_tinggal'=>'required',
            'no_telp'=>'required',
            'orang_deket'=>'required',
            'skill'=>'required',
            'salary'=>'required',
        ]);

        User::find(Auth::user()->id)->update(
            $request->all()
        );

        return back()->with('success', 'Berhasil Perbaharui Data Diri');
    }
}
