@extends('dashboard.layouts.main')

@section('content')

<div class="row mt-4">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>Detail data {{ $user->username }}</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-sm table-striped">
                    <tbody>
                        <tr>
                            <td>Name</td>
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
            </div>
          </div>
    </div>
</div>

@endsection

