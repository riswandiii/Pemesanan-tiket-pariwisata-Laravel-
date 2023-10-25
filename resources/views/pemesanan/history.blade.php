@extends('index')

@section('content')

<div class="container py-4">

    <div class="row text-center">
        <div class="col-lg-12">
            <h3>History pemesanan {{ $user }}</h3>
        </div>
    </div>

     {{-- Alert --}}
     @if(session()->has('success'))
     <div class="row mt-3 justify-content-center">
         <div class="col-lg-6">
             <small>
                 <div class="alert alert-primary" role="alert">
                     {{ session('success') }}
                 </div>
             </small>
         </div>
     </div>
     @endif
     {{-- End alert --}}

     <div class="row py-3">
        <div class="col-lg-12">
            {{-- Table pemesanan detail --}}
            <div class="table-responsive">
                <small>
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th>No</th>
                                <th>Pariwisata</th>
                                <th>Harga tiket</th>
                                <th>Jumlah pesan</th>
                                <th>Tanggal</th>
                                <th>Harga</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @if($detailPesanan->count() > 0)
                           @foreach($detailPesanan as $pesananDetail)
                           <tr>
                               <td>{{ $loop->iteration }}</td>
                               <td>{{ $pesananDetail->parawisata->parawisata }}</td>
                               <td>Rp. {{ number_format($pesananDetail->parawisata->harga) }}</td>
                               <td>{{ $pesananDetail->jumlah }}</td>
                               <td>{{ $pesananDetail->created_at }}</td>
                               <td>Rp. {{ number_format($pesananDetail->harga) }}</td>
                               <td><a href="{{ asset('storage/' . $pesananDetail->parawisata->image) }}" target="_blankP"><img src="{{ asset('storage/' . $pesananDetail->parawisata->image) }}" alt="" width="70" title="{{ $pesananDetail->parawisata->parawisata }}"></a></td>
                               <td>
                                   <a href="/checkout-pesanan/{{ $pesananDetail->id }}" class="badge bg-warning"><i class="bi bi-eye-fill"></i></a>
                                   {{-- Form delete --}}
                                   <form action="/delete-pesanan/{{ $pesananDetail->id }}" method="post" class="d-inline">
                                       @csrf 
                                       @method('delete')
                                       <button type="submit" class="border-0 badge bg-danger" onclick="return confirm('Are you sure you want to delete the order?')"><i class="bi bi-trash"></i></button>
                                   </form>
                                   {{-- End form --}}
                               </td>
                           </tr>
                           @endforeach
                           @else 
                           <tr>
                            <td>
                                <td colspan="8" class="text-danger">Anda belum memiliki history pemesanan!</td>
                            </td>
                           </tr>
                           @endif
                        </tbody>
                    </table>
                </small>
            </div>
            {{-- End table --}}
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h5>Jumlah data : {{ $jumlah }}</h5>
        </div>
    </div>

</div>

@endsection
