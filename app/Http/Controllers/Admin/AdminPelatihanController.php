<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelatihan;
use Illuminate\Http\Request;

class AdminPelatihanController extends Controller
{
    public function edit($id)
    {
        $pelatihan = Pelatihan::find($id);
        return view('admin.pelatihan.pelatihan_edit', compact('pelatihan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kursus'=>'required',
        ]);

        $pelatihan = Pelatihan::find($id);
        $pelatihan->update(
            $request->all()
        );

        return to_route('admin.detail', $pelatihan->id_user)->with('success', 'Berhasil Memperbaharui Pelatihan / Kursus Baru');
    }
}
