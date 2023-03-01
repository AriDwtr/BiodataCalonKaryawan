<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class AdminPekerjaanController extends Controller
{
    public function edit($id)
    {
        $pekerjaan = Pekerjaan::find($id);
        return view('admin.pekerjaan.pekerjaan_edit', compact(['pekerjaan']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'perusahaan'=>'required',
            'posisi_terakhir'=>'required',
            'pendapatan_terakhir'=>'required',
        ]);

        $pekerjaan = Pekerjaan::find($id);
        $pekerjaan->update(
            $request->all()
        );

        return to_route('admin.detail', $pekerjaan->id_user)->with('success', 'Berhasil Memperbaharui Riwayat Pekerjaan');
    }
}
