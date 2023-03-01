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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center"><u>RIWAYAT PEKERJAAN</u></h5>
                        <form action="{{ route('admin.pekerjaan.update', $pekerjaan->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row mt-2">
                                <div class="col-3">
                                    Nama Perusahaan
                                </div>
                                <div class="col-9">
                                    <input type="text" name="perusahaan"
                                        class="form-control @error('perusahaan')
                                is-invalid
                                @enderror"
                                        id="" value="{{ $pekerjaan->perusahaan }}" placeholder="Nama Perusahaan">
                                    @error('perusahaan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    Posisi Terakhir
                                </div>
                                <div class="col-9">
                                    <input type="text" name="posisi_terakhir"
                                        class="form-control @error('posisi_terakhir')
                                is-invalid
                                @enderror"
                                        id="" value="{{ $pekerjaan->posisi_terakhir }}" placeholder="Posisi Terakhir">
                                    @error('posisi_terakhir')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    Pendapataan Terakhir
                                </div>
                                <div class="col-9">
                                    <input type="number" name="pendapatan_terakhir"
                                        class="form-control @error('pendapatan_terakhir')
                                is-invalid
                                @enderror"
                                        id="" value="{{ $pekerjaan->pendapatan_terakhir }}" placeholder="Pendapatan Terakhir">
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
                                <div class="col-3">
                                    Tahun
                                </div>
                                <div class="col-9">
                                    <select name="tahun_perusahaan" class="form-select">
                                        @foreach ($years as $year)
                                            <option value="{{ $year }}" {{ $year == $pekerjaan->tahun_perusahaan ? 'selected' : '' }}>
                                                {{ $year }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <button type="submit" class="btn btn-warning w-100">Perbaharui Riwayat Pekerjaan</button>
                                <a href="{{ route('admin.edit', $pekerjaan->id_user) }}" class="btn btn-secondary w-100 mt-2"><< Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
