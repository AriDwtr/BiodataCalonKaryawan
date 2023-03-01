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
                        <h5 class="card-title text-center"><u>PENDIDIKAN TERAKHIR</u></h5>
                        <form action="{{ route('pendidikan.store') }}" method="post">
                            @csrf
                            <div class="row mt-2">
                                <div class="col-6">
                                    Jenjang Pendidikan Terakhir
                                </div>
                                <div class="col-6">
                                    <select name="jenjang" class="form-select" id="">
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                        <option value="D3">D3</option>
                                        <option value="D4">D4</option>
                                        <option value="S1" selected>S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    Nama Institusi Akademik
                                </div>
                                <div class="col-6">
                                    <input type="text" name="institusi"
                                        class="form-control @error('institusi')
                                is-invalid
                                @enderror"
                                        id="" value="{{ old('institusi') }}" placeholder="Nama Institusi Akademik">
                                    @error('institusi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    Jurusan
                                </div>
                                <div class="col-6">
                                    <input type="text" name="jurusan"
                                        class="form-control @error('jurusan')
                                is-invalid
                                @enderror"
                                        id="" value="{{ old('jurusan') }}" placeholder="jurusan Pendidikan">
                                    @error('jurusan')
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
                                    Tahun Lulus
                                </div>
                                <div class="col-6">
                                    <select name="tahun_pendidikan" class="form-select">
                                        @foreach ($years as $year)
                                            <option value="{{ $year }}" {{ $year == 2023 ? 'selected' : '' }}>
                                                {{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    IPK
                                </div>
                                <div class="col-6">
                                    <input type="text" inputmode="numeric" name="ipk"
                                        class="form-control @error('ipk')
                                is-invalid
                                @enderror"
                                        id="" value="{{ old('ipk') }}" placeholder="3.90"
                                        pattern="[0-9]+([,\.][0-9]+)?" formnovalidate>
                                    @error('ipk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="text" name="id_user" value="{{ Auth::user()->id }}" hidden>
                            <div class="row mt-4">
                                <button type="submit" class="btn btn-primary w-100">Simpan Riwayat Pendidikan</button>
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
                                        <th class="text-center">Jenjang Pendidikan</th>
                                        <th class="text-center">Nama Institusi Akademik</th>
                                        <th class="text-center">Jurusan</th>
                                        <th class="text-center">Tahun Lulus</th>
                                        <th class="text-center">IPK</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pendidikan as $pendidikan)
                                        <tr>
                                            <td class="text-center">{{ $pendidikan->jenjang }}</td>
                                            <td>{{ Str::Title($pendidikan->institusi) }}</td>
                                            <td>{{ Str::Title($pendidikan->jurusan) }}</td>
                                            <td>{{ $pendidikan->tahun_pendidikan }}</td>
                                            <td>{{ $pendidikan->ipk }}</td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('pendidikan.edit', $pendidikan->id) }}"
                                                        class="btn btn-warning btn-sm mr-2">Edit</a>&nbsp;&nbsp;
                                                    <a class="btn btn-danger btn-sm mr-2 href="{{ route('pendidikan.destroy', $pendidikan->id) }}"
                                                        onclick="event.preventDefault();
                                                     document.getElementById('delete-pendidikan-{{ $pendidikan->id }}').submit();">
                                                        Hapus
                                                    </a>

                                                    <form id="delete-pendidikan-{{ $pendidikan->id }}" action="{{ route('pendidikan.destroy', $pendidikan->id) }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center"><b>BELUM ADA DATA PENDIDIKAN
                                                    TERAKHIR</b></td>
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
