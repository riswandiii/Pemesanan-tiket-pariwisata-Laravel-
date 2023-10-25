@extends('dashboard.layouts.main')

@section('content')

<div class="container">

    {{-- Form Pencarian --}}
    <div class="row mt-5">
        <div class="col-lg-8">
            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Pariwisata..." name="search" value="{{ request('search') }}" autofocus>
                    <button class="btn btn-primary" type="submit">Search</button>
                  </div>
            </form>
        </div>
    </div>
    {{-- End Form --}}

    {{-- Jika ada pencarian --}}
            @if(request('search'))
            <div class="row mt-1 justify-content-end text-end">
                <div class="col-lg-6">
                    @if($pariwisatas->count() > 0)
                        <p class="text-success">Pencarian <strong style="font-style: italic">"{{ request('search') }}"</strong> ditemukan!</p>
                    @else
                    <p class="text-danger">Pencarian <strong style="font-style: italic">"{{ request('search') }}"</strong> tidak ditemukan!</p>
                    @endif
                </div>
            </div>
            @else
            @endif 
    {{-- End --}}

    {{-- Alert --}}
    @if(session()->has('success'))
            <div class="row mt-1 mb-3">
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

    <div class="row mt-1 mb-3">
        <div class="col-lg-12">
            <h3>Data pariwisata di Tanah Toraja</h3>
        </div>
    </div>

    <div class="row mt-1 mb-3">
        <div class="col-lg-12">
            <a href="/dashboard/pariwisata/create" class="btn btn-primary btn-sm">+Create pariwisata</a>
            <a href="/export-pariwisata-pdf" class="btn btn-danger btn-sm">Export pdf</a>
            <a href="/export-exel" class="btn btn-success btn-sm">Export exel</a>
        </div>
    </div>

    {{-- Table data pariwisata --}}
    <div class="row">
        <div class="col-lg-12">
           <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr class="text-white bg-primary">
                            <th>No</th>
                            <th>Pariwisata</th>
                            <th>Alamat</th>
                            {{-- <th>Image</th> --}}
                            <th>Harga</th>
                            <th>Maps</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($pariwisatas->count() > 0)
                        @foreach($pariwisatas as $pariwisata)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pariwisata->parawisata }}</td>
                            <td>{{ $pariwisata->alamat }}</td>
                            {{-- <td><a href="{{ asset('storage/' . $pariwisata->image) }}"><img src="{{ asset('storage/' . $pariwisata->image) }}" alt="" width="100" height="100" class="img-fluid"></a></td> --}}
                            <td>Rp. {{ number_format($pariwisata->harga) }}</td>
                            <td><iframe src="{{ $pariwisata->maps }}"></iframe></td>
                            <td>
                                <a href="/dashboard/pariwisata/{{ $pariwisata->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                                <a href="/dashboard/pariwisata/{{ $pariwisata->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                                {{-- Form Delete --}}
                                <form action="/dashboard/pariwisata/{{ $pariwisata->id }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="badge bg-danger border-0" onclick="return confirm('Are you sure you want to delete data?')"><span data-feather="x-circle"></span></button>
                                </form>
                                {{-- End form --}}
                            </td> 
                        </tr>
                        @endforeach
                        @else 
                        <tr>
                            <td colspan="7" class="text-danger">Belum ada data pariwisata</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
           </div>
        </div>
    </div>
    {{-- End table --}}

    <div class="row mt-3">
        <div class="col-lg-4">
            <small>{{ $pariwisatas->links() }}</small>
        </div>
    </div>

</div>

@endsection