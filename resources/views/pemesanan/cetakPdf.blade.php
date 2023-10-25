<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
h2 {
    font-style: italic;
    color: red;
    text-align: center;
    font-family: Arial, Helvetica, sans-serif
}
h1 {
    text-align: center;
    font-family: Arial, Helvetica, sans-serif
}
h3 {
    text-align: center;
    font-family: Arial, Helvetica, sans-serif
}
</style>
</head>
<body>

<h1>Tiket Pariwisata {{ $data->parawisata->parawisata }}</h1>
<br>

<table id="customers">
  <tr>
    <td>No</td>
    <td>Pariwisata</td>
    <td>{{ $data->parawisata->parawisata }}</td>
  </tr>
  <tr>
    <td>1</td>
    <td>Alamat</td>
    <td>{{ $data->parawisata->alamat }}</td>
  </tr>
  <tr>
    <td>2</td>
    <td>Harga tiket</td>
    <td>Rp. {{ number_format($data->parawisata->harga) }}</td>
  </tr>
  <tr>
    <td>3</td>
    <td>Jumlah Pesan</td>
    <td>{{ $data->jumlah }}</td>
  </tr>
  <tr>
    <td>4</td>
    <td>Total harga</td>
    <td>Rp. {{ number_format($data->harga) }}</td>
  </tr>
</table>

<br>
<h2>Note : </h2>
<h3>Silahkan membawa tiket tersebut pada saat Anda mengunjungi tempat pariwisata <strong style="font-style: italic">"{{ $data->parawisata->parawisata }}"</strong> tersebut!</h3>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>


