@extends('dashboard.layouts.main')

@section('content')

<div class="container">

    <div class="row py-3">
        <div class="col-lg-12">
            <h3>Data pesanan detail</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr class="text-white bg-primary">
                            <th>No</th>
                            <th>Pariwisata</th>
                            <th>Gambar</th>
                            <th>Harga tiket</th>
                            <th>Jumlah tiket</th>
                            <th>Total harga</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detailPesanans as $pesanan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pesanan->parawisata->parawisata }}</td>
                            <td><img src="{{ asset('storage/' . $pesanan->parawisata->image) }}" width="50" alt=""></td>
                            <td>Rp. {{ number_format($pesanan->parawisata->harga) }}</td>
                            <td>{{ $pesanan->jumlah }}</td>
                            <td>{{ $pesanan->harga }}</td>
                            <td>
                                @if($pesanan->status == 0)
                                <p class="text-danger">Pesanan belum di checkout</p>
                                @elseif($pesanan->status == 1)
                                <p class="text-success">Pesanan sudah di checkout</p>
                                @elseif($pesanan->status == 2)
                                <p class="text-success">Pesanan sudah di checkout dan sudah upload bukti tf</p>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- End table --}}
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="mt-3">
                <h5>Jumlah data : {{ $jumlahData }}</h5>
        </div>
        </div>
    </div>

</div>

@endsection