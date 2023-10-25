@extends('index')

@section('content')

<div class="container py-5">

    <div class="row text-center mb-3">
        <div class="col-lg-12">
           <h3>{{ $pariwisata }}</h3>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-lg-6 offset-lg-3">
            <div class="card">
                <img src="{{ asset('storage/' . $pariwisatas->image) }}" alt="">
                <div class="card-body">
                    @if($comentar->count() > 0)
                    @foreach($comentar as $coment)
                    <ul class="list-group" style="border-radius:20px;">
                        <li class="list-group-item mb-2 p-1 bg-light"><strong><i class="bi bi-person-circle"> </i>{{ $coment->user->username }} : </strong> {{ $coment->coment }}</li>
                      </ul>
                    @endforeach
                    @else 
                    <div class="div">
                        <h3><i class="bi bi-chat-left-dots"></i></h3>
                        <h5>Belum ada komentar</h5>
                        <p>Jadilah yang pertama mengomentari</p>
                    </div>
                    @endif 
                </div>
              </div>
        </div>
    </div>

    {{-- Form Comentar --}}
    <div class="row mt-3">
        <div class="col-lg-6 offset-lg-3 d-inline">
            <form action="/comentar" method="post">
            @csrf 
            <div class="table-responsive">
                <table>
                    <tbody>
                        <tr>
                            <th>
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="parawisata_id" value="{{ $pariwisatas->id }}">
                                <input type="text" name="coment" class="form-control" style="border-radius: 20px;">
                            </th>
                            <th class="text-light">:</th>
                            <th><button type="submit" class="btn btn-primary btn-sm" style="border-radius: 20px;">Kirim</button></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            </form>
        </div>
    </div>
    {{-- end Form --}}

</div>

@endsection