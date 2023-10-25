@extends('index')

@section('content')

<div class="container py-3">

     <div class="row py-3 text-center">
        <div class="col-lg-12">
            <h3>{{ $pesananDetail->parawisata->parawisata }}</h3>
        </div>
     </div>

     <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mb-3">
                <img src="{{ asset('storage/' . $pesananDetail->parawisata->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{ $pesananDetail->parawisata->parawisata }}</h5>
                  <p class="card-text"><strong>Harga tiket : Rp.</strong> {{ number_format($pesananDetail->parawisata->harga) }}</p>
                  <p class="card-text"><strong>Jumlah pesan :</strong> {{ $pesananDetail->jumlah }}</p>
                  <p class="card-text"><strong>Total harga : Rp.</strong> {{ number_format($pesananDetail->harga) }}</p>

                  @if($pesananDetail->status == '0')
                  <div>
                    {{-- Checkout --}}
                    <a href="/checkout/{{ $pesananDetail->id }}" class="btn btn-primary btn-sm" onclick="return confirm('Are you sure you want to checkout the order?')"><i class="bi bi-cart4"></i> Checkout</a>
                    {{-- End checkout --}}
                  </div>
                  @elseif($pesananDetail->status == '1')
                  <p class="text-success"><strong>Silahkan upload bukti pembayaran terlebih dahulu untuk mencetak tiket!</strong></p>
                  <div class="col-lg-8">
                    {{-- Form upload bukti pembayaran --}}
                    <form action="/upload-bukti-pembayaran" method="post" enctype="multipart/form-data">
                      @csrf
                    <div>
                      <input type="hidden" name="pesanan_detail_id" value="{{ $pesananDetail->id }}">
                      <img class="col-lg-2 img-preview img-fluid mb-2">
                      <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" onchange="previewImage()">
                      @error('image')
                          <div class="invalid-feddback">
                              {{ $message }}
                          </div>
                      @enderror
                      <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>
                    </div>
                    </form>
                    {{-- End for --}}
                  </div>
                  @elseif($pesananDetail->status == '2')
                  {{-- Alert bukti tf --}}
                    @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                      <small>{{ session('success') }}</small>
                    </div>
                    @endif
                  {{-- End alert --}}
                  <a href="/cetak-tiket/{{ $pesananDetail->id }}" class="btn btn-info btn-sm" target="_blank" ><i class="bi bi-printer-fill"></i> Cetak pdf</a>
                  @elseif($pesananDetail->status == '3')
                  <p>3</p>
                  @endif

                </div>
              </div>
        </div>
     </div>

</div>

@endsection