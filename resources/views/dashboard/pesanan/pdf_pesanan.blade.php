<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body class="bg-light">
   

    <div class="container-fluid">
        <div class="container">

            <div class="row text-center py-3">
                <div class="col-lg-12">
                    <h3>DATA-DATA PESANAN</h3>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr class="text-white bg-primary">
                                    <th>No</th>
                                    <th>Pemesan</th>
                                    <th>No. Handphone</th>
                                    <th>Email</th>
                                    <th>Tanggal pesanan</th>
                                    <th>Total harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($pesanans->count() > 0)
                                    @foreach($pesanans as $pesanan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $pesanan->user->username }}</td>
                                        <td>{{ $pesanan->user->no_handphone }}</td>
                                        <td>{{ $pesanan->user->email }}</td>
                                        <td>{{ $pesanan->tanggal_pesanan }}</td>
                                        <td>Rp. {{ number_format($pesanan->total_harga) }}</td>
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
    </div>

    <script>
        window.print();
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>