@extends('dashboard.layouts.main')

@section('content')

<div class="container">

    <div class="row py-3 mt-2">
        <div class="col-lg-12">
            <h3>{{ $detail }}</h3>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <div class="card mb-3">
                <a href="{{ asset('storage/' . $pariwisata->image) }}" target="_blank">
                    <img src="{{ asset('storage/' . $pariwisata->image) }}" title="{{ $pariwisata->parawisata }}" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                  <h5 class="card-title">{{ $pariwisata->parawisata }}</h5>
                  <p>{{ $pariwisata->tentang }}</p>
                  <p><strong>Alamat : </strong>{{ $pariwisata->alamat }}</p>
                  <p><strong>Harga : </strong>Rp. {{ number_format($pariwisata->harga) }}</p>
                  <div>
                    <iframe src="{{ $pariwisata->maps }}"></iframe>
                  </div>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
              </div>
        </div>
    </div>

</div>

@endsection