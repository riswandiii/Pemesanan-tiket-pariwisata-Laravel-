@extends('index')

@section('content')

<div class="container py-3">
    <div class="row justify-content-center">

        <div class="row mb-3 mt-2 text-center">
            <div class="col-lg-12">
                <h3>Silahkan pesan tiket {{ $pariwisata->parawisata }}</h3>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card mb-3">
                <img src="{{ asset('storage/' . $pariwisata->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $pariwisata->parawisata }}</h5>
                  <p class="card-text"><strong>Harga : Rp </strong>{{ number_format($pariwisata->harga) }}</p>
                  <div>
                    {{-- Form jumlah pesan --}}
                    <div class="col-lg-6">
                        <form action="/pesan/{{ $pariwisata->id }}" method="post">
                            @csrf
                            <input type="text" name="jumlah" class="form-control col-lg-6" required autofocus>
                           <div>
                            <button type="submit" class="btn btn-primary btn-sm mt-3"><i class="bi bi-cart4"></i>Pesan sekarang</button>
                           </div>
                        </form>
                    </div>
                    {{-- End form --}}
                  </div>
                </div>
              </div>
        </div>
    </div>
</div>

@endsection