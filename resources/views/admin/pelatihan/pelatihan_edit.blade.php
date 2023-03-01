@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center"><u>RIWAYAT PELATIHAN</u></h5>
                        <form action="{{ route('admin.pelatihan.update', $pelatihan->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row mt-2">
                                <div class="col-3">
                                    Nama Kursus Pelatihan
                                </div>
                                <div class="col-9">
                                    <input type="text" name="kursus"
                                        class="form-control @error('kursus')
                                is-invalid
                                @enderror"
                                        id="" value="{{ $pelatihan->kursus }}" placeholder="Nama Kursus / Pelatihan">
                                    @error('kursus')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    Sertifikat (ADA / TIDAK)
                                </div>
                                <div class="col-4">
                                    <select name="sertifikat" class="form-select" id="">
                                        <option value="ADA" {{ $pelatihan->sertifikat=="ADA" ? 'selected' : '' }}>ADA</option>
                                        <option value="TIDAK" {{ $pelatihan->sertifikat=="TIDAK" ? 'selected' : '' }}>TIDAK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                @php
                                    $years = range(1900, strftime('%Y', time()));
                                @endphp
                                <div class="col-3">
                                    Tahun
                                </div>
                                <div class="col-9">
                                    <select name="tahun_sertifikat" class="form-select">
                                        @foreach ($years as $year)
                                            <option value="{{ $year }}" {{ $year == $pelatihan->tahun_sertifikat ? 'selected' : '' }}>
                                                {{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <button type="submit" class="btn btn-warning w-100">Perbaharui Riwayat Pelatihan</button>
                                <a href="{{ route('admin.edit', $pelatihan->id_user) }}" class="btn btn-secondary w-100 mt-2"><< Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
