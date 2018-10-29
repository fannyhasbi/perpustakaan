<?php
if(!isset($_GET['id']))
  header("Location: ./index.php");

require_once __DIR__."/../core/autoload.php";

if(isset($_GET['confirm'])){

}

$query  = "SELECT * FROM buku WHERE id = ". $_GET['id'];
$result = mysqli_query($connect, $query);

// Jika tidak ada data
if($result->num_rows == 0)
  header("Location: ./index.php");

$data = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Konfirmasi Pinjam | Perpustakaan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <h1>Konfirmasi Pinjam Buku</h1>
  
  <div>
    <p>Berikut adalah data buku yang ingin Anda pinjam :</p>
    <table>
    <table cellpadding="5">
      <tr>
        <th>Judul buku</th>
        <td><?= $data['judul']; ?></td>
      </tr>
      <tr>
        <th>Pengarang</th>
        <td><?= $data['pengarang']; ?></td>
      </tr>
      <tr>
        <th>Tahun terbit</th>
        <td><?= $data['tahun']; ?></td>
      </tr>
      <tr>
        <th>Penerbit</th>
        <td><?= $data['penerbit']; ?></td>
      </tr>
      <tr>
        <th>Kategori</th>
        <td><?= $data['kategori'] != NULL ? $data['kategori'] : 'Tidak ada' ?></td>
      </tr>
    </table>

    <br>

    <a href="<?= './pinjam.php?id='. $data['id'] .'&confirm=yes'; ?>">Lanjutkan</a>
    <br>
    <a href="javascript:window.history.back();">Batalkan</a>
  </div>
</body>
</html>