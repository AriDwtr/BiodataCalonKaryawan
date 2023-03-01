<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use Illuminate\Http\Request;

class AdminPendidikanController extends Controller
{
    public function edit($id)
    {
        $pendidikan = Pendidikan::find($id);
        return view('admin.pendidikan.pendidikan_edit', compact('pendidikan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'institusi'=>'required',
            'jurusan'=>'required',
            'ipk'=>'required|numeric',
        ]);

        $pendidikan = Pendidikan::find($id);

        $pendidikan->update(
            $request->all()
        );

        return to_route('admin.detail', $pendidikan->id_user)->with('success', 'Berhasil Mengedit Riwayat Pendidikan');
    }
}
