@extends('index')

@section('content')

<div class="container">

    <div class="row py-3 justify-content-center">
        <div class="col-lg-4">
            <img src="/img/logo.png" width="50" alt="">
            <h3 class="d-inline">Please Registration!</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 offset-lg-4 mb-3">
            {{-- Form Registration --}}
            <form action="/register" method="post">
            @csrf

            <div class="mb-2">
                <input type="text" name="name" placeholder="Name..." class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-2">
                <input type="text" name="username" placeholder="Username..." class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-2">
                <input type="number" name="no_handphone" placeholder="No. Handphone..." class="form-control @error('no_handphone') is-invalid @enderror" value="{{ old('no_handphone') }}">
                @error('no_handphone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-2">
                <input type="email" name="email" placeholder="Email..." class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-2">
                <input type="password" name="password" placeholder="Password..." class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">Registration</button>
            </div>

            </form>
            {{-- end Form --}}
        </div>
    </div>

</div>

@endsection