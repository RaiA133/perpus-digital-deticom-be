<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KTA | MY PERPUS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('assets_user/css/kta.css') }}">
</head>
<body>
  <div class="container">
    <div class="header">
      <div class="tgl">
        <p>Dicetak: <br> {{ $now }}</p>
      </div>
      <div class="title">
        <h2>MY PERPUSTAKAAN</h2>
        <h4>Kartu Tanda Anggota</h4>
      </div>
    </div>

    <div>
      <hr>
    </div>

    <div class="profile gap-3">
      <div class="gambar">
        <img src="{{ asset('storage/img/' . $users->img ) }}" alt="">
      </div>

      <div class="bio">
        <table >
          <tbody>
            <tr>
              <th scope="row">Nama</th>
              <td>{{ $users->name }}</td>
            </tr>
            <tr>
              <th scope="row">NIM</th>
              <td>{{ $users->nim }}</td>
            </tr>
            <tr>
              <th scope="row">Tgl Lahir</th>
              <td>{{ $users->t_lahir }}, {{ $users->ttl }} </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="qr">
       {!! QrCode::size(100)->generate("https://pmiiuninus.com/qrcode/varifikasi/kta/{$users->id}/anjay/mabar/ckuahsksdfsihew/S3NAT-4NJ1NG-63lut-73ng/51-3nd1") !!}
      </div>

    </div>

    <div>
      <hr>
    </div>
    <div class="footer">
      <p>Kartu ini adalah tanda bahwa anggota tersebut adalah benar pengguna my perpus</p>
    </div>

  </div>

  <script type="text/javascript">
         window.print();
  </script>
</body>
</html>