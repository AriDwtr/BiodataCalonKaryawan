@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        <div class="card">
            <div class="card-body">
                <h3 class="text-center"><u>Data Diri Pelamar</u></h3>
                <div class="text-center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('admin.edit', $data->id) }}" class="btn btn-warning" style="color:white">Edit Data</a>&nbsp;&nbsp;
                        <a href="{{ route('admin.delete', $data->id) }}" class="btn btn-danger" onclick="return confirm('Apakah Yakin Ingin Menghapus Data Ini?')">Hapus Data</a>
                      </div>
                </div>
                <form class="mt-5" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            Posisi Yang Di Lamar
                        </div>
                        <div class="col-9">
                            <input type="text"
                                class="form-control @error('posisi')
                            is-invalid
                        @enderror"
                                name="posisi" value="{{ $data->posisi }}" id="" placeholder="Programmer" readonly>
                            @error('posisi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3">
                            Nama Lengkap
                        </div>
                        <div class="col-9">
                            <input type="text"
                                class="form-control @error('nama')
                            is-invalid
                        @enderror"
                                name="nama" value="{{ $data->nama }}" id="" placeholder="Nama Lengkap" readonly>
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3">
                            No. KTP
                        </div>
                        <div class="col-9">
                            <input type="number"
                                class="form-control @error('ktp')
                            is-invalid
                        @enderror"
                                name="ktp" value="{{ $data->ktp }}" id="" placeholder="123456789" readonly>
                            @error('ktp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3">
                            Tempat, Tanggal Lahir
                        </div>
                        <div class="col-4">
                            <input type="text"
                                class="form-control @error('tempat_lahir')
                            is-invalid
                        @enderror"
                                name="tempat_lahir" value="{{ $data->tempat_lahir }}" id="" placeholder="Semarang" readonly>
                            @error('tempat_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-5">
                            <input type="date"
                                class="form-control @error('tanggal_lahir')
                            is-invalid
                        @enderror"
                                name="tanggal_lahir" value="{{ $data->tanggal_lahir }}" id="" readonly>
                            @error('tanggal_lahir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3">
                            Jenis Kelamin
                        </div>
                        <div class="col-9">
                            <select name="jk" class="form-select" disabled>
                                <option value="L" {{ $data->jk == 'L' ? 'selected' : '' }}>Laki - Laki</option>
                                <option value="P" {{ $data->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3">
                            Agama
                        </div>
                        <div class="col-9">
                            <select name="Agama" class="form-select" disabled>
                                <option value="Islam" {{ $data->Agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Protestan" {{ $data->Agama == 'Protestan' ? 'selected' : '' }}>Protestan
                                </option>
                                <option value="Katolik" {{ $data->Agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                <option value="Hindu" {{ $data->Agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ $data->Agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Khonghucu" {{ $data->Agama == 'Khonghucu' ? 'selected' : '' }}>Khonghucu
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3">
                            Golongan Darah
                        </div>
                        <div class="col-9">
                            <select name="gol_darah" class="form-select" disabled>
                                <option value="A" {{ $data->gol_darah == 'A' ? 'selected' : '' }}>A</option>
                                <option value="AB" {{ $data->gol_darah == 'AB' ? 'selected' : '' }}>AB</option>
                                <option value="B" {{ $data->gol_darah == 'B' ? 'selected' : '' }}>B</option>
                                <option value="O" {{ $data->gol_darah == 'O' ? 'selected' : '' }}>O</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3">
                            Status Pernikahan
                        </div>
                        <div class="col-9">
                            <select name="status" class="form-select" disabled>
                                <option value="Lajang" {{ $data->status == 'Lajang' ? 'selected' : '' }}>Lajang</option>
                                <option value="Menikah" {{ $data->status == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                <option value="Janda/Duda" {{ $data->status == 'Janda / Duda' ? 'selected' : '' }}>
                                    Janda/Duda
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3">
                            Alamat KTP
                        </div>
                        <div class="col-9">
                            <textarea name="alamat_ktp"
                                class="form-control @error('alamat_ktp')
                            is-invalid
                        @enderror"
                                id="" cols="5" rows="2" placeholder="Alamat KTP" readonly>{{ $data->alamat_ktp }}</textarea>
                        </div>
                        @error('alamat_ktp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <div class="col-3">
                            Alamat Tinggal
                        </div>
                        <div class="col-9">
                            <textarea name="alamat_tinggal"
                                class="form-control @error('alamat_tinggal')
                            is-invalid
                        @enderror"
                                id="" cols="5" rows="2" placeholder="Alamat Tinggal" readonly>{{ $data->alamat_tinggal }}</textarea>
                        </div>
                        @error('alamat_tinggal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row mt-2">
                        <div class="col-3">
                            Email
                        </div>
                        <div class="col-9">
                            <input type="email"
                                class="form-control @error('email')
                            is-invalid
                        @enderror"
                                name="email" value="{{ $data->email }}" id="" placeholder="Email" readonly>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3">
                            No. Telp
                        </div>
                        <div class="col-9">
                            <input type="number"
                                class="form-control @error('no_telp')
                            is-invalid
                        @enderror"
                                name="no_telp" value="{{ $data->no_telp }}" id="" placeholder="No Telp" readonly>
                            @error('no_telp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3">
                            Orang Terdekat Yang Dapat Di Hubungi
                        </div>
                        <div class="col-9">
                            <input type="text"
                                class="form-control @error('orang_deket')
                            is-invalid
                        @enderror"
                                name="orang_deket" value="{{ $data->orang_deket }}" id=""
                                placeholder="Orang Terdekat" readonly>
                            @error('orang_deket')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            Pendidikan Terakhir
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr class="table-secondary">
                                        <th class="text-center">Jenjang Pendidikan</th>
                                        <th class="text-center">Nama Institusi Akademik</th>
                                        <th class="text-center">Jurusan</th>
                                        <th class="text-center">Tahun Lulus</th>
                                        <th class="text-center">IPK</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pendidikan as $pendidikan)
                                    <tr>
                                        <td class="text-center">{{ $pendidikan->jenjang }}</td>
                                        <td class="text-center">{{ Str::Title($pendidikan->institusi) }}</td>
                                        <td class="text-center">{{ Str::Title($pendidikan->jurusan) }}</td>
                                        <td class="text-center">{{ $pendidikan->tahun_pendidikan }}</td>
                                        <td class="text-center">{{ $pendidikan->ipk }}</td>
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
                    <div class="row mt-2">
                        <div class="col-6">
                            Riwayat Pelatihan
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr class="table-secondary">
                                        <th class="text-center">Nama Kursus / Seminar</th>
                                        <th class="text-center">Sertifikat (ADA / TIDAK)</th>
                                        <th class="text-center">Tahun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pelatihan as $pelatihan)
                                        <tr>
                                            <td class="text-center">{{ $pelatihan->kursus }}</td>
                                            <td class="text-center">{{ Str::Title($pelatihan->sertifikat) }}</td>
                                            <td class="text-center">{{ Str::Title($pelatihan->tahun_sertifikat) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center"><b>BELUM ADA DATA RIWAYAT PELATIHAN</b>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            Riwayat Pekerjaan
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-12">
                            <table class="table">
                                <thead>
                                    <tr class="table-secondary">
                                        <th class="text-center">Nama Perusahaan</th>
                                        <th class="text-center">Posisi Terakhir</th>
                                        <th class="text-center">Pendapatan Terakhir</th>
                                        <th class="text-center">Tahun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pekerjaan as $pekerjaan)
                                        <tr>
                                            <td class="text-center">{{ Str::Upper($pekerjaan->perusahaan) }}</td>
                                            <td class="text-center">{{ Str::Title($pekerjaan->posisi_terakhir) }}</td>
                                            <td class="text-center">Rp. {{ $pekerjaan->pendapatan_terakhir }}</td>
                                            <td class="text-center">{{ $pekerjaan->tahun_perusahaan }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center"><b>TIDAK RIWAYAT PEKERJAAN</b></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3">
                            Skill
                        </div>
                        <div class="col-9">
                            <input type="text"
                                class="form-control @error('skill')
                                is-invalid
                            @enderror"
                                name="skill" value="{{ $data->skill }}"
                                placeholder="Tulis Keahlian & Keterampilan Yang Saat Ini Anda Miliki" readonly>
                            @error('skill')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-5">
                            Bersedia Di Tempatkan Di Seluruh Kantor Perusahaan
                        </div>
                        <div class="col-2">
                            <select name="onsite" class="form-select" disabled>
                                <option value="Y" {{ $data->onsite == 'Y' ? 'selected' : '' }}>YA</option>
                                <option value="N" {{ $data->onsite == 'N' ? 'selected' : '' }}>TIDAK</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3">
                            Penghasilan Yang Di Harapkan / Bulan
                        </div>
                        <div class="col-9">
                            <input type="number"
                                class="form-control @error('salary')
                                is-invalid
                            @enderror"
                                name="salary" value="{{ $data->salary }}" placeholder="3000000" readonly>
                            @error('salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <a href="{{ route('admin.home') }}" class="btn btn-secondary w-100"><< Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
