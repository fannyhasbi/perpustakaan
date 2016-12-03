<!DOCTYPE html>
<html>
<head>
	<title>Buku</title>
	<link rel="stylesheet" href="view/main.css"/>
</head>
<body>
<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="anggota.php">Anggota</a></li>
	<li><a href="buku.php">Buku</a></li>
	<li><a href="pinjam.php">Pinjam</a></li>
</ul>

<table border="1">
	<thead>
		<tr>
			<th>ID Buku</th>
			<th>Judul</th>
			<th>Pengarang</th>
			<th>Jenis Buku</th>
			<th>Penerbit</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		require_once "core/init.php";
		$query = "SELECT * FROM buku ORDER BY id_buku";		
		$hasil = mysqli_query($koneksi, $query);

		while($row = mysqli_fetch_assoc($hasil)){
			$file = "buku/" . strtolower(str_replace(" ","-",$row['judul'])) . ".html";
		?>
		<tr>
			<td><?php echo $row['id_buku']; ?></td>
			<td><a href="<?php echo $file; ?>"><?php echo $row['judul']; ?></a></td>
			<td><?php echo $row['pengarang']; ?></td>
			<td><?php echo $row['jenis_buku']; ?></td>
			<td><?php echo $row['penerbit']; ?></td>
			<td><a href="proses_pinjam.php?id_buku=<?php echo $row['id_buku'];?>">Pinjam</a></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>

<a href="input_buku.php">Tambah Buku</a>

</body>
</html>