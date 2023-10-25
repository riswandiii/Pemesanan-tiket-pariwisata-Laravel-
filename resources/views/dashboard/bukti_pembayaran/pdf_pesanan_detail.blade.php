<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pesanan Detail</title>
    <style>
        #tr {
            background-color: blue;
            color: white;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body class="bg-light">
   

    <div class="container-fluid">
        <div class="container">

            <div class="row text-center py-3">
                <div class="col-lg-12">
                    <h3>DATA-DATA PESANAN DETAIL</h3>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr id="tr">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Pariwisata</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total harga</th>
                                    <th>Bukti</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($datas->count() > 0)
                                @foreach($datas as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->pesananDetail->pesanan->user->username }}</td>
                                    <td>{{ $data->pesananDetail->pesanan->user->email }}</td>
                                    <td>{{ $data->pesananDetail->parawisata->parawisata }}</td>
                                    <td>Rp. {{ number_format($data->pesananDetail->parawisata->harga) }}</td>
                                    <td>{{ $data->pesananDetail->jumlah }}</td>
                                    <td>Rp. {{ number_format($data->pesananDetail->harga) }}</td>
                                    <td><a href="{{ asset('storage/' . $data->image) }}" target="_blank"><img src="{{ asset('storage/' . $data->image) }}" width="50p" alt=""></a></td>
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

            <div class="row mb-3">
                <div class="col-lg-12">
                    <h5>Jumlah data : {{ $jumlah }}</h5>
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