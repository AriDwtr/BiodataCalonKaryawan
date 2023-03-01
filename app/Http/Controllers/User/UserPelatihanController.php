<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelatihan = Pelatihan::Where('id_user', Auth::user()->id)->get();
        return view('user.pelatihan.pelatihan', compact('pelatihan'));
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
            'kursus'=>'required',
        ]);

        Pelatihan::create(
            $request->all()
        );

        return back()->with('success', 'Berhasil Menambahkan Pelatihan / Kursus Baru');
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
        $pelatihan = Pelatihan::find($id);
        return view('user.pelatihan.pelatihan_edit', compact('pelatihan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kursus'=>'required',
        ]);

        Pelatihan::find($id)->update(
            $request->all()
        );

        return to_route('pelatihan.index')->with('success', 'Berhasil Memperbaharui Pelatihan / Kursus Baru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pelatihan::find($id)->delete();
        return back()->with('success', 'Berhasil Menghapus Pelatihan / Kursus');
    }
}
