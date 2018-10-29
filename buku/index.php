<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Buku | Perpustakaan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <h1>Daftar Buku Perpustakaan</h1>
  <p>Silahkan pilih buku untuk dipinjam.</p>

  <?php
  require_once __DIR__."/../core/autoload.php";
  $query = "SELECT * FROM buku";
  $result= mysqli_query($connect, $query) OR die(mysql_error());
  ?>

  <table border="1" cellspacing="0" cellpadding="4">
    <thead>
      <tr>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Tahun</th>
        <th>Penerbit</th>
        <th>Kategori</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
          <td>
            <a href="<?= './detail.php?id='. $row['id'] ?>">
              <?= $row['judul']; ?>
            </a>
          </td>
          <td><?= $row['pengarang']; ?></td>
          <td><?= $row['tahun']; ?></td>
          <td><?= $row['penerbit']; ?></td>
          <td><?= $row['kategori'] != NULL ? $row['kategori'] : 'Tidak ada'; ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>