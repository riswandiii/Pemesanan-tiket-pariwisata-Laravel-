@extends('index')

@section('content')


<div class="container">

  {{-- Form Search --}}
  <div class="row justify-content-center">
      <div class="col-lg-6 mt-5">
        <form action="" method="get">
          <div class="input-group mb-3">
            <input type="text" autofocus class="form-control" placeholder="Search....." name="search" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Search</button>
          </div>
        </form>
      </div>
  </div>
  {{-- End Search --}}

  {{-- Jika ada proses search --}}
  <div class="row justify-content-center">
    @if(request('search'))
    @if($parawisatas->count() > 0)
    <div class="col-lg-6 mt-3">
      <p class="text-success">Pencarian pariwisata <strong style="font-style: italic;">"{{ request('search') }}"</strong> ditemukan!</p>
    </div>
    @else 
    <div class="col-lg-6 mt-3">
      <p class="text-danger">Pencarian pariwisata <strong style="font-style: italic;">"{{ request('search') }}"</strong> tidak ditemukan!</p>
    </div>
    @endif
    @endif
  </div>
  {{-- End --}}

    @if($parawisatas->count() > 0)
    <div class="row">
      <div class="col-lg-8 offset-lg-2 mt-3">
        @foreach($parawisatas as $pariwisata)
          {{-- Card --}}
          <div class="card mb-3">
            <img data-aos="flip-left" data-aos-duration="800" src="{{ asset('storage/' . $pariwisata->image) }}" class="card-img-top" alt="..." title="{{ $pariwisata->parawisata }}">
            <div class="card-body">
              <h5 class="card-title">{{ $pariwisata->parawisata }}</h5>
              <p class="card-text">{{ $pariwisata->tentang }}</p>
              <p class="card-text"><strong>Alamat :</strong> {{ $pariwisata->alamat }}</p>
              <p class="card-text"><strong>Harga :</strong> {{ number_format($pariwisata->harga) }}</p>
                <div>
                    <iframe src="{{ $pariwisata->maps }}"></iframe>
                </div>
                <div>
                  <a href="/pesan/{{ $pariwisata->id }}" class="btn btn-primary btn-sm mt-2"><i class="bi bi-cart4"></i>Pesan</a>
                </div>
            </div>
                {{-- Like dan Komentar --}}
                <?php 
                    $like = App\Models\Like::where('parawisata_id', $pariwisata->id)->count();
                    $coment = App\Models\Coment::where('parawisata_id', $pariwisata->id)->count();
                ?>
                <nav class="navbar bg-dark">
                    <div class="container-fluid">
                     <div class="container">
                        <div class="row text-white mt-2">
                            <div class="col-lg-2 offset-lg-2 col-sm-6 col-6">
                                @if(empty($like))
                                <form action="/like" method="post">
                                  @csrf 
                                  <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                  <input type="hidden" name="parawisata_id" value="{{ $pariwisata->id }}">
                                  <input type="hidden" name="like" value="1">
                                  <button type="submit" class="border-0 bg-dark"><p class="text-white"><i class="bi bi-hand-thumbs-up text-white"></i>0</p></button>
                                </form>
                                @else 
                                <form action="/like" method="post">
                                  @csrf 
                                  <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                  <input type="hidden" name="parawisata_id" value="{{ $pariwisata->id }}">
                                  <input type="hidden" name="like" value="1">
                                  <button type="submit" class="border-0 bg-dark"><p class="text-white"><i class="bi bi-hand-thumbs-up text-white"></i>{{ $like }}</p></button>
                                </form>
                                @endif 
                            </div>
                            <div class="col-lg-2 col-sm-6 col-6">
                                @if(empty($coment))
                                <a href="/comentar/{{ $pariwisata->id }}" class="text-decoration-none text-white">
                                <p><i class="bi bi-chat-left"></i> 0</p></a>
                                @else 
                                <a href="/comentar/{{ $pariwisata->id }}" class="text-decoration-none text-white">
                                  <p><i class="bi bi-chat-left"></i> {{ $coment }}</p></a>
                                @endif
                            </div>
                        </div>
                     </div>
                    </div>
                </nav>
                {{-- End --}}
          </div>
          {{-- End card --}}
        @endforeach
      </div>
    </div>

    <div class="row py-3">
      <div class="col-lg-8 offset-lg-2">
        {{ $parawisatas->links() }}
      </div>
    </div>

    @else 
    <div class="row justify-content-center">
      <div class="col-lg-6 mb-3">
        <h3 class="text-danger">tourism data not found</h3>
      </div>
    </div>
    @endif

  </div>

@endsection