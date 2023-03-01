@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center"><u>RIWAYAT PELATIHAN</u></h5>
                        <form action="{{ route('pelatihan.store') }}" method="post">
                            @csrf
                            <div class="row mt-2">
                                <div class="col-6">
                                    Nama Kursus Pelatihan
                                </div>
                                <div class="col-6">
                                    <input type="text" name="kursus"
                                        class="form-control @error('kursus')
                                is-invalid
                                @enderror"
                                        id="" value="{{ old('kursus') }}" placeholder="Nama Kursus / Pelatihan">
                                    @error('kursus')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    Sertifikat (ADA / TIDAK)
                                </div>
                                <div class="col-4">
                                    <select name="sertifikat" class="form-select" id="">
                                        <option value="ADA">ADA</option>
                                        <option value="TIDAK">TIDAK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                @php
                                    $years = range(1900, strftime('%Y', time()));
                                @endphp
                                <div class="col-6">
                                    Tahun
                                </div>
                                <div class="col-6">
                                    <select name="tahun_sertifikat" class="form-select">
                                        @foreach ($years as $year)
                                            <option value="{{ $year }}" {{ $year == 2023 ? 'selected' : '' }}>
                                                {{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="text" name="id_user" value="{{ Auth::user()->id }}" hidden>
                            <div class="row mt-4">
                                <button type="submit" class="btn btn-primary w-100">Simpan Riwayat Pelatihan</button>
                                <a href="{{ route('user.data_diri') }}" class="btn btn-secondary w-100 mt-2"><< Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr class="table-secondary">
                                        <th class="text-center">Nama Kursus / Seminar</th>
                                        <th class="text-center">Sertifikat (ADA / TIDAK)</th>
                                        <th class="text-center">Tahun</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pelatihan as $pelatihan)
                                        <tr>
                                            <td class="text-center">{{ $pelatihan->kursus }}</td>
                                            <td class="text-center">{{ Str::Title($pelatihan->sertifikat) }}</td>
                                            <td class="text-center">{{ Str::Title($pelatihan->tahun_sertifikat) }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('pelatihan.edit', $pelatihan->id) }}"
                                                        class="btn btn-warning btn-sm mr-2">Edit</a>&nbsp;&nbsp;
                                                    <a class="btn btn-danger btn-sm mr-2 href="{{ route('pelatihan.destroy', $pelatihan->id) }}"
                                                        onclick="event.preventDefault();
                                                     document.getElementById('delete-pelatihan-{{ $pelatihan->id }}').submit();">
                                                        Hapus
                                                    </a>

                                                    <form id="delete-pelatihan-{{ $pelatihan->id }}" action="{{ route('pelatihan.destroy', $pelatihan->id) }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center"><b>BELUM ADA DATA PELATIHAN
                                                    / KURSUS</b></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
