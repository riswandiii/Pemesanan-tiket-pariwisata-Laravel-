@extends('index')

@section('content')

<div class="container py-3">
    
    <div class="row text-center mb-3">
        <div class="col-lg-12">
            <h3><img src="/img/logo.png" width="50" alt=""> Please Login</h3>
        </div>
    </div>

    {{-- Alert --}}
    <div class="row mb-3">
        <div class="col-lg-4 offset-lg-4">
            @if(session()->has('success'))
            <small>
                <div class="alert alert-primary" role="alert">
                    {{ session('success') }}
                </div>
            </small>
            @endif
        </div>
    </div>
    {{-- End Alert --}}

    {{-- Form Login --}}
    <div class="row mb-3">
        <div class="col-lg-4 offset-lg-4">
            <form action="/login" method="post">
                @csrf 

                <div class="mb-2">
                    <input type="text" placeholder="Email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-2">
                    <input type="password" placeholder="Password" name="password" class="form-control @error('password') is-invalid @enderror" id="password-login">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Show password
                    </label>
                  </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">LOGIN</button>
                </div>

            </form>
        </div>
    </div>
    {{-- End Form --}}

</div>

@endsection