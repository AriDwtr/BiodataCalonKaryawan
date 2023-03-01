<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pekerjaan = Pekerjaan::Where('id_user', Auth::user()->id)->get();
        return view('user.pekerjaan.pekerjaan', compact('pekerjaan'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'perusahaan'=>'required',
            'posisi_terakhir'=>'required',
            'pendapatan_terakhir'=>'required',
        ]);

        Pekerjaan::create(
            $request->all()
        );

        return back()->with('success', 'Berhasil Menambahkan Riwayat Pekerjaan Baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pekerjaan = Pekerjaan::find($id);
        return view('user.pekerjaan.pekerjaan_edit', compact(['pekerjaan']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'perusahaan'=>'required',
            'posisi_terakhir'=>'required',
            'pendapatan_terakhir'=>'required',
        ]);

        Pekerjaan::find($id)->update(
            $request->all()
        );

        return to_route('pekerjaan.index')->with('success', 'Berhasil Memperbaharui Riwayat Pekerjaan Baru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pekerjaan::find($id)->delete();

        return back()->with('success', 'Berhasil Menghapus Riwayat Pekerjaan');
    }
}
