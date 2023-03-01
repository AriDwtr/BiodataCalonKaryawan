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
                        <h5 class="card-title text-center"><u>RIWAYAT PEKERJAAN</u></h5>
                        <form action="{{ route('pekerjaan.store') }}" method="post">
                            @csrf
                            <div class="row mt-2">
                                <div class="col-6">
                                    Nama Perusahaan
                                </div>
                                <div class="col-6">
                                    <input type="text" name="perusahaan"
                                        class="form-control @error('perusahaan')
                                is-invalid
                                @enderror"
                                        id="" value="{{ old('perusahaan') }}" placeholder="Nama Perusahaan">
                                    @error('perusahaan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    Posisi Terakhir
                                </div>
                                <div class="col-6">
                                    <input type="text" name="posisi_terakhir"
                                        class="form-control @error('posisi_terakhir')
                                is-invalid
                                @enderror"
                                        id="" value="{{ old('posisi_terakhir') }}" placeholder="Posisi Terakhir">
                                    @error('posisi_terakhir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    Pendapataan Terakhir
                                </div>
                                <div class="col-6">
                                    <input type="number" name="pendapatan_terakhir"
                                        class="form-control @error('pendapatan_terakhir')
                                is-invalid
                                @enderror"
                                        id="" value="{{ old('pendapatan_terakhir') }}" placeholder="Pendapatan Terakhir">
                                    @error('pendapatan_terakhir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
                                    <select name="tahun_perusahaan" class="form-select">
                                        @foreach ($years as $year)
                                            <option value="{{ $year }}" {{ $year == 2023 ? 'selected' : '' }}>
                                                {{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="text" name="id_user" value="{{ Auth::user()->id }}" hidden>
                            <div class="row mt-4">
                                <button type="submit" class="btn btn-primary w-100">Simpan Riwayat Pekerjaan</button>
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
                                        <th class="text-center">Nama Perusahaan</th>
                                        <th class="text-center">Posisi Terakhir</th>
                                        <th class="text-center">Pendapatan Terakhir</th>
                                        <th class="text-center">Tahun</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pekerjaan as $pekerjaan)
                                        <tr>
                                            <td class="text-center">{{ Str::Upper($pekerjaan->perusahaan) }}</td>
                                            <td class="text-center">{{ Str::Title($pekerjaan->posisi_terakhir) }}</td>
                                            <td class="text-center">Rp. {{ $pekerjaan->pendapatan_terakhir }}</td>
                                            <td class="text-center">{{ $pekerjaan->tahun_perusahaan }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('pekerjaan.edit', $pekerjaan->id) }}"
                                                        class="btn btn-warning btn-sm mr-2">Edit</a>&nbsp;&nbsp;
                                                    <a class="btn btn-danger btn-sm mr-2 href="{{ route('pekerjaan.destroy', $pekerjaan->id) }}"
                                                        onclick="event.preventDefault();
                                                     document.getElementById('delete-pekerjaan-{{ $pekerjaan->id }}').submit();">
                                                        Hapus
                                                    </a>

                                                    <form id="delete-pekerjaan-{{ $pekerjaan->id }}" action="{{ route('pekerjaan.destroy', $pekerjaan->id) }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center"><b>TIDAK RIWAYAT PEKERJAAN</b></td>
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
