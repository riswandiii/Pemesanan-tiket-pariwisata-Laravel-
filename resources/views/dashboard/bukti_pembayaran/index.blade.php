@extends('dashboard.layouts.main')

@section('content')

<div class="container">

    <div class="row py-3">
        <div class="col-lg-12">
            <h3>Data bukti pembayaran</h3>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-12">
            <a href="/dashboard/pdf-pesanan-detail" target="_blank" class="btn btn-danger btn-sm"><i class="bi bi-file-earmark-pdf-fill"></i> Cetak</a>
        </div>
    </div>

    <div class="row mb-1">
        <div class="col-lg-12">
            {{-- Table data bukti pembayaran --}}
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th>No</th>
                            <th>Nama</th>
                            <th>No. Handphone</th>
                            <th>Email</th>
                            <th>Pariwisata</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total harga</th>
                            <th>Bukti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->pesananDetail->pesanan->user->username }}</td>
                            <td>{{ $data->pesananDetail->pesanan->user->no_handphone }}</td>
                            <td>{{ $data->pesananDetail->pesanan->user->email }}</td>
                            <td>{{ $data->pesananDetail->parawisata->parawisata }}</td>
                            <td>Rp. {{ number_format($data->pesananDetail->parawisata->harga) }}</td>
                            <td>{{ $data->pesananDetail->jumlah }}</td>
                            <td>Rp. {{ number_format($data->pesananDetail->harga) }}</td>
                            <td><a href="{{ asset('storage/' . $data->image) }}" target="_blank"><img src="{{ asset('storage/' . $data->image) }}" width="50p" alt=""></a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- End table --}}
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-12">
            <h5>Jumlah data : {{ $jumlah }}</h5>
        </div>
    </div>

</div>

@endsection