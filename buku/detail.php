<?php
require_once __DIR__."/../core/autoload.php";

// Jika tidak diakses lewat link URL yang memiliki id
if(!isset($_GET['id']))
  header("Location: ./index.php");

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
  <title><?= $data['judul']; ?> | Perpustakaan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <h1>Detail Buku</h1>
  <p>Berikut adalah detail buku yang Anda inginkan</p>
  
  <div>
    <h3><?= $data['judul']; ?></h3>

    <table cellpadding="5">
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
  </div>

  <br>

  <div>
    <a href="<?= './pinjam.php?id='. $data['id'] ?>">Pinjam Buku</a>
  </div>
</body>
</html>