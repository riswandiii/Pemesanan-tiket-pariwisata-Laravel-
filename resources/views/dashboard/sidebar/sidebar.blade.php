<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/pariwisata*') ? 'active' : '' }}" href="/dashboard/pariwisata">
            <span data-feather="file"></span>
            Data pariwisata
          </a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="shopping-cart"></span>
            Products
          </a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/custumers*') ? 'active' : '' }}" href="/dashboard/custumers">
            <span data-feather="users"></span>
            Customers
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/pesanan*') ? 'active' : '' }}" href="/dashboard/pesanan">
            <span data-feather="file"></span>
            Data pesanan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/bukti-pembayaran*') ? 'active' : '' }}" href="/dashboard/bukti-pembayaran">
            <span data-feather="file"></span>
            Data bukti pembayaran
          </a>
        </li>
      </ul>
    </div>
  </nav>