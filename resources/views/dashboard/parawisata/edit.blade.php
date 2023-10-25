@extends('dashboard.layouts.main')

@section('content')

<div class="container">
    <div class="row py-3">
        <h3>{{ $edit }}</h3>
    </div>
</div>

{{-- Form create --}}
<div class="row mb-3">
    <div class="col-lg-8">
        <form action="/dashboard/pariwisata/{{ $pariwisata->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="gambarLama" value="{{ $pariwisata->image }}">
           <div class="mb-2">
                <label for="" class="form-label">Pariwisata</label>
                <input type="text" name="parawisata" class="form-control @error('parawisata') is-invalid @enderror" value="{{ old('parawisata', $pariwisata->parawisata) }}">
                @error('parawisata')
                    <div class="invalid-feddback">
                        {{ $message }}
                    </div>
                @enderror
           </div>

           <div class="mb-2">
            <label for="" class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $pariwisata->alamat) }}">
            @error('alamat')
                <div class="invalid-feddback">
                    {{ $message }}
                </div>
            @enderror
          </div>

          <div class="mb-2">
            <label for="" class="form-label" >Tentang</label>
            <textarea class="form-control @error('tentang') is-invalid @enderror" id="" rows="3" name="tentang"></textarea>
            @error('tentang')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>

          <div class="mb-2">
            <label for="" class="form-label">Image</label>
            @if($pariwisata->image)
            <img src="{{ asset('storage/' . $pariwisata->image) }}" alt="" class="col-lg-2 img-preview img-fluid mb-2 d-block">
            @else 
            <img class="col-lg-2 img-preview img-fluid mb-2">
            @endif 
            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" onchange="previewImage()">
            @error('image')
                <div class="invalid-feddback">
                    {{ $message }}
                </div>
            @enderror
          </div>

          <div class="mb-2">
            <label for="" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $pariwisata->harga) }}">
            @error('harga')
                <div class="invalid-feddback">
                    {{ $message }}
                </div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="" class="form-label">Maps</label>
            <input type="text" name="maps" class="form-control @error('maps') is-invalid @enderror" value="{{ old('maps', $pariwisata->maps) }}">
            @error('maps')
                <div class="invalid-feddback">
                    {{ $message }}
                </div>
            @enderror
          </div>

          <div class=" mb-3">
                <button type="submit" class="btn btn-primary btn-sm w-50">Submit</button>
                <button type="reset" class="btn btn-danger btn-sm">Reset</button>
          </div>

        </form>
    </div>
</div>
{{-- End form --}}

@endsection