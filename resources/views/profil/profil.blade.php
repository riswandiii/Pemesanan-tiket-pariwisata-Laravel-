@extends('index')

@section('content')

<div class="container">

    <div class="row py-5">

        <div class="col-lg-8 offset-lg-2">
            <div class="card border-0">
                <div class="card-header text-white bg-primary">
                    <h3><i class="bi bi-person-dash-fill"></i> My Profile {{ $nama }}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>:</td>
                                    <td>{{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <td>No. Handphone</td>
                                    <td>:</td>
                                    <td>{{ $user->no_handphone }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Form edit profile --}}
                    <h4 class="py-3">Form edit profile {{ $user->username }}</h4 class="mt-py-3">
                        @if(session()->has('success'))
                        <div class="row mb-4">
                            <div class="col-lg-8">
                                <div class="alert alert-primary" role="alert">
                                   {{ session('success') }}
                                </div>
                            </div>
                        </div>
                        @endif
                    <div class="row">
                        <div class="col-lg-8">

                                <form action="/edit-profile/{{ $user->id }}" method="post">
                                    @csrf
            
                                    <div class="mb-2">
                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                    </div>
            
                                    <div class="mb-2">
                                        <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                                    </div>
            
                                    <div class="mb-2">
                                        <input type="number" name="no_handphone" class="form-control" value="{{ $user->no_handphone }}">
                                    </div>
            
                                    <div class="mb-2">
                                        <input type="text" name="email" class="form-control" value="{{ $user->email }}">
                                    </div>

                                    <div class="mb-2">
                                        <input type="password_baru" name="password_baru" class="form-control" placeholder="Password baru">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                    </div>
        
                            </form>
                        </div>
                    </div>
                    {{-- End form --}}

                </div>
            </div>
        </div>

    </div>

</div>

@endsection