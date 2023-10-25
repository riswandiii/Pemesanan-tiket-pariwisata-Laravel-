@extends('index')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-lg-8 offset-lg-2 py-4">
            <div class="card p-5 border-0">
                <h3 class="text-primary">Send us a message</h3>
                    <p><small>Please contact the contact below to provide suggestions or comments on the website</small></p>
                    {{-- Form --}}
                    <form action="" method="">
                        <div class="mb-2">
                            <input type="text" name="name" placeholder="Enter your name" class="form-control">
                        </div>
                        <div class="mb-2">
                            <input type="text" name="email" placeholder="Enter your email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="message" rows="3" placeholder="Enter your message"></textarea>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary btn-sm">Send Now</button>
                        </div>
                    </form>
            {{-- End form --}}
            </div>
        </div>
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-3 mb-4 text-center offset-lg-1">
            <i class="bi bi-telephone-fill"></i>
            <small><strong class="d-block">Phone</strong></small>
            <small><div class="d-block">+081 241 731 108</div></small>
            <small><div>+085 393 855 091</div></small>
        </div>

        <div class="col-lg-3 offset-lg-1 mb-4 text-center">
            <i class="bi bi-geo-alt"></i>
            <small><strong class="d-block">Address</strong></small>
            <small><div class="d-block">Kab. Takalar</div></small>
            <small><div>Kec. Galesong-Selatan</div></small>
        </div>

        <div class="col-lg-3 mb-4 text-center mb-4 offset-lg-1">
            <i class="bi bi-envelope-plus-fill"></i>
            <small><strong class="d-block">Email</strong></small>
            <small><div class="d-block">riswandiandi017@gmail.com</div></small>
            <small><div>riswandi17@gmail.co.id</div></small>
        </div>

    </div>

</div>

@endsection