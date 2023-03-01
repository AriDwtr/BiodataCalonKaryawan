@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center"><u>PENDIDIKAN TERAKHIR</u></h5>
                        <form action="{{ route('pendidikan.update', $pendidikan->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row mt-2">
                                <div class="col-3">
                                    Jenjang Pendidikan Terakhir
                                </div>
                                <div class="col-9">
                                    <select name="jenjang" class="form-select" id="">
                                        <option value="SD" {{ $pendidikan->jenjang=="SD" ? 'selected' : '' }}>SD</option>
                                        <option value="SMP" {{ $pendidikan->jenjang=="SMP" ? 'selected' : '' }}>SMP</option>
                                        <option value="SMA/SMK/MA" {{ $pendidikan->jenjang=="SMA/SMK/MA" ? 'selected' : '' }}>SMA/SMK/MA</option>
                                        <option value="D3" {{ $pendidikan->jenjang=="D3" ? 'selected' : '' }}>D3</option>
                                        <option value="D4" {{ $pendidikan->jenjang=="D4" ? 'selected' : '' }}>D4</option>
                                        <option value="S1" {{ $pendidikan->jenjang=="S1" ? 'selected' : '' }}>S1</option>
                                        <option value="S2" {{ $pendidikan->jenjang=="S2" ? 'selected' : '' }}>S2</option>
                                        <option value="S3" {{ $pendidikan->jenjang=="S3" ? 'selected' : '' }}>S3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    Nama Institusi Akademik
                                </div>
                                <div class="col-9">
                                    <input type="text" name="institusi"
                                        class="form-control @error('institusi')
                                is-invalid
                                @enderror"
                                        id="" value="{{ $pendidikan->institusi }}" placeholder="Nama Institusi Akademik">
                                    @error('institusi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    Jurusan
                                </div>
                                <div class="col-9">
                                    <input type="text" name="jurusan"
                                        class="form-control @error('jurusan')
                                is-invalid
                                @enderror"
                                        id="" value="{{ $pendidikan->jurusan }}" placeholder="jurusan Pendidikan">
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
                                <div class="col-3">
                                    Tahun Lulus
                                </div>
                                <div class="col-9">
                                    <select name="tahun_pendidikan" class="form-select">
                                        @foreach ($years as $year)
                                            <option value="{{ $year }}" {{ $year == $pendidikan->tahun_pendidikan ? 'selected' : '' }}>
                                                {{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    IPK
                                </div>
                                <div class="col-9">
                                    <input type="text" inputmode="numeric" name="ipk"
                                        class="form-control @error('ipk')
                                is-invalid
                                @enderror"
                                        id="" value="{{ $pendidikan->ipk }}" placeholder="3.90" pattern="[0-9]+([,\.][0-9]+)?" formnovalidate>
                                    @error('ipk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="text" name="id_user" value="{{ Auth::user()->id }}" hidden>
                            <div class="row mt-4">
                                <button type="submit" class="btn btn-warning w-100">Edit Riwayat Pendidikan</button>
                                <a href="{{ route('pendidikan.index') }}" class="btn btn-secondary w-100 mt-2"><< Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
