@extends('dashboard.layouts.main')

@section('content')

<div class="container">

    <div class="row py-3">
        <div class="col-lg-12">
            <h3>Data custumer</h3>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            {{-- Form seacrh --}}
            <form action="" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search" autofocus value="{{ request('search') }}">
                    <button class="btn btn-outline-primary" type="submit">Search</button>
                  </div>
            </form>
            {{-- End form --}}
        </div>
    </div>

    {{-- Jika ada search --}}
    @if(request('search'))
        <div class="row mb-3">
            <div class="col-lg-12">
                @if($users->count() > 0)
                    <p class="text-success">Pencarian custumer atas nama : <strong style="font-style: italic">"{{ request('search') }}"</strong> ditemukan!</p>
                @else 
                    <p class="text-danger">Pencarian custumer atas nama : <strong style="font-style: italic">"{{ request('search') }}"</strong> tidak ditemukan!</p>
                @endif
            </div>
        </div>
    @endif
    {{-- End seacrh --}}

    <div class="row mb-3">
        <div class="col-lg-12">
            <a href="/dashboard/pdf-custumer" target="_blank" class="btn btn-danger btn-sm"><i class="bi bi-file-earmark-pdf-fill"></i> Cetak</a>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr class="text-white bg-primary">
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>No. Handphone</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($users->count() > 0)
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->no_handphone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="/dashboard/custumers/{{ $user->id }}" class="btn btn-warning btn-sm"><span data-feather="eye"></a>
                                </td>
                            </tr>
                            @endforeach
                        @else 
                            <tr>
                                <td colspan="7" class="text-danger">Tidak ada nama custumer atas nama <strong>{{ request('search') }}</strong></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection