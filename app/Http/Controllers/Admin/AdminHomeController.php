<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use App\Models\Pelatihan;
use App\Models\Pendidikan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        $list = User::Where('type','user')->where('nama', '<>', '')->orderBy('nama', 'asc')->paginate(10);
        return view('admin.home', compact('list'));
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        if($cari == ""){
            return to_route('admin.home');
        }
        else {
        $list = User::Where('nama','like',"%".$cari."%")
        ->orWhere('posisi','like',"%".$cari."%")->paginate(10);
        return view('admin.home', compact('list'));
        }
    }

    public function detail_pegawai($id)
    {
        $data = User::find($id);
        $pendidikan = Pendidikan::Where('id_user', $id)->get();
        $pelatihan = Pelatihan::Where('id_user', $id)->get();
        $pekerjaan = Pekerjaan::Where('id_user', $id)->get();
        return view('admin.calon_pegawai.detail_calon_pegawai', compact('data','pendidikan','pelatihan','pekerjaan'));
    }

    public function edit_pegawai($id)
    {
        $data = User::find($id);
        $pendidikan = Pendidikan::Where('id_user', $id)->get();
        $pelatihan = Pelatihan::Where('id_user', $id)->get();
        $pekerjaan = Pekerjaan::Where('id_user', $id)->get();
        return view('admin.calon_pegawai.edit_calon_pegawai', compact('data','pendidikan','pelatihan','pekerjaan'));
    }

    public function update_pegawai(Request $request, $id)
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

        User::find($id)->update(
            $request->all()
        );

        return to_route('admin.detail', $id)->with('success', 'Berhasil Perbaharui Data Diri Calon Pegawai');
    }

    public function delete_pegawai($id)
    {
        User::find($id)->delete();
        Pendidikan::Where('id_user', $id)->delete();
        Pelatihan::Where('id_user', $id)->delete();
        Pekerjaan::Where('id_user', $id)->delete();

        return to_route('admin.home');
    }
}
