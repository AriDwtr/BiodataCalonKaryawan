@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.cari') }}" method="get">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="cari" class="form-control" placeholder="Tulis Nama, Posisi Yang Di Lamar"
                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">LIST DATA CALON PEGAWAI</div>

                    <div class="card-body">
                        <table class="table" border="1">
                            <thead>
                                <tr class="table-secondary">
                                    <th class="text-center">Nama Lengkap</th>
                                    <th class="text-center">Tempat & Tanggal Lahir</th>
                                    <th class="text-center">Posisi Yang DiLamar</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($list as $data)
                                    <tr>
                                        <td class="text-center"><b>{{ Str::title($data->nama) }}</b></td>
                                        <td class="text-center">
                                            <i>{{ Str::title($data->tempat_lahir) . ', ' . Date('d-m-Y', Strtotime($data->tanggal_lahir)) }}</i>
                                        </td>
                                        <td class="text-center">{{ Str::Upper($data->posisi) }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.detail', $data->id) }}"
                                                class="btn btn-info btn-sm">Lihat Detail</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center"><b>Data Tidak Di Temukan</b></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-felx justify-content-center mt-2">
                            {{ $list->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
