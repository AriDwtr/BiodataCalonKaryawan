<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPendidikanTerakhirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendidikan = Pendidikan::Where('id_user', Auth::user()->id)->get();
        return view('user.pendidikan.pendidikan', compact('pendidikan'));
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
            'institusi'=>'required',
            'jurusan'=>'required',
            'ipk'=>'required|numeric',
        ]);

        Pendidikan::create(
            $request->all()
        );

        return back()->with('success', 'Berhasil Menambahkan Riwayat Pendidikan');
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
        $pendidikan = Pendidikan::find($id);
        return view('user.pendidikan.pendidikan_edit', compact('pendidikan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'institusi'=>'required',
            'jurusan'=>'required',
            'ipk'=>'required|numeric',
        ]);

        Pendidikan::find($id)->update(
            $request->all()
        );

        return to_route('pendidikan.index')->with('success', 'Berhasil Mengedit Riwayat Pendidikan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pendidikan::find($id)->delete();
        return back()->with('success', 'Berhasil Menghapus Riwayat Pendidikan');
    }
}
