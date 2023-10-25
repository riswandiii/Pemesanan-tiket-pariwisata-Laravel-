@extends('dashboard.layouts.main')

@section('content')

<div class="container">

    <div class="row py-3">
        <h3>Data pesanan</h3>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            {{-- Form search --}}
            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="date" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search..." autofocus>
                    <button class="btn btn-warning" type="submit">Search</button>
                </div>
            </form>
            {{-- End form --}}
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-12">
            <a href="/dashboard/pdf-pesanan" target="_blank" class="btn btn-danger btn-sm"><i class="bi bi-file-earmark-pdf-fill"></i> Cetak</a>
        </div>
    </div>

    {{-- Jika ada pencarian --}}
    @if(request('search'));
    <div class="row mb-3">
        <div class="col-lg-6">
            @if($pesanans->count() > 0)
                <p class="text-success">Data pesanan pada <strong style="font-style: italic">"{{ request('search') }}"</strong> ditemukan!</p>
            @else 
                <p class="text-danger">Data pesanan pada <strong style="font-style: italic">"{{ request('search') }}"</strong> tidak ditemukan!</p>
            @endif
        </div>
    </div>
    @endif
    {{-- End  --}}

    <div class="row mb-3">
        <div class="col-lg-12">
            {{-- Table data pesanan --}}
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr class="bg-primary text-white">
                            <th>No</th>
                            <th>Pemesan</th>
                            <th>No. Handphone</th>
                            <th>Email</th>
                            <th>Tanggal pesanan</th>
                            <th>Total harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesanans as $pesanan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pesanan->user->username }}</td>
                            <td>{{ $pesanan->user->no_handphone }}</td>
                            <td>{{ $pesanan->user->email }}</td>
                            <td>{{ $pesanan->tanggal_pesanan }}</td>
                            <td>Rp. {{ number_format($pesanan->total_harga) }}</td>
                            <td>
                                <a href="/dashboard/pesanan/{{ $pesanan->id }}" class="btn btn-warning btn-sm"><span data-feather="eye"></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- End pesanan --}}
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-12">
            {{ $pesanans->links() }}
        </div>
    </div>

</div>

@endsection