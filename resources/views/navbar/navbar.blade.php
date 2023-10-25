<div class="container-fluid" id="navbar">

    <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="#"><img data-aos="flip-left" data-aos-duration="800" src="/img/logo.png" alt="" width="60"><h3 class="d-inline text-white"> PARIWISATA E-TIKET</h3></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon bg-warning"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              @auth
              <li class="nav-item" id="li">
                <a class="nav-link text-white" aria-current="page" href="/">Home</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link text-white" href="#">About Us</a>
              </li> --}}
              <?php 
              $pesanan = App\Models\Pesanan::where('user_id', auth()->user()->id)->first();
              if(!empty($pesanan)){
                $notif = $pesananDetail = App\Models\PesananDetail::where('pesanan_id', $pesanan->id)->where('status', 0)->count();
              }
              ?>
              @if(!empty($notif))
              <li class="nav-item" id="li">
                <a class="nav-link text-white" href="/keranjang/{{ $pesanan->id }}"><i class="bi bi-cart4"></i>{{ $notif }}</a>
              </li>
              @else 
              <li class="nav-item" id="li">
                <a class="nav-link text-white" href="#"><i class="bi bi-cart4">0</i></a>
              </li>
              @endif
              <li class="nav-item">
                <a class="nav-link text-white" href="/contact-us" id="li">Contact US</a>
              </li>
              <li class="nav-item dropdown" id="li">
                <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-person-dash-fill"></i> Welcome, {{ auth()->user()->username }}
                </a>
                <ul class="dropdown-menu">
                  @can('admin')
                  <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                  @endcan
                  <li><a class="dropdown-item" href="/my-profil">My profil</a></li>
                  <li><a class="dropdown-item" href="/history-pemesanan/{{ auth()->user()->id }}">History pemesanan</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                     {{-- Form Logour --}}
                     <form action="/logout" method="post">
                      @csrf
                        <button type="submit" class="dropdown-item" onclick="return confirm('Sure you want out?')">Logout</button>
                     </form>
                     {{-- ENd form --}}
                  </li>
                </ul>
              </li>
              @else
              <li class="nav-item">
                <a class="nav-link {{ Request::is('login') ? 'active' : '' }} text-white" href="/login">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ Request::is('register') ? 'active' : '' }} text-white" href="/register">Register</a>
              </li>
              @endif
            </ul>
          </div>
        </div>
      </nav>

      <div class="container py-3">
            <div class="row text-center text-white">
                <div class="col-lg-12">
                    <h3>~WELCOME TO THE WEBSITE~</h3>
                </div>
            </div>
            <hr class="bg-warning">
      </div>

      <div class="container">
        <div class="row text-center">
            <div class="col-lg-8 offset-lg-2 mb-5">
                <h1 class="text-white">PEMESANAN E-TIKET PARIWISATA DI SULAWESI SELATAN</h1>
            </div>
        </div>
      </div>

    

</div>