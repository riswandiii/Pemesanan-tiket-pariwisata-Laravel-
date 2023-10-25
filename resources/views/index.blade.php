<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    {{-- Aos animation --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    {{-- Style css --}}
    <link rel="stylesheet" href="/css/style.css">

    {{-- Icons Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

  </head>
  <body>

    {{-- navbar --}}
    @include('navbar.navbar')
    {{-- end navbar --}}

    <div class="container-fluid bg-light">
        @yield('content')
    </div>

    {{-- footer --}}
    @include('footer.footer')
    {{-- End footer --}}

    {{-- Jquery --}}
    <script src="/js/jquery.js"></script>

    {{-- Aos animation --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
      <script>
        AOS.init();
      </script>

    {{-- Script js --}}
    <script src="/js/script.js"></script>

    {{-- Dashboard admin js --}}
    <script src="/js/dashboard_admin.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>