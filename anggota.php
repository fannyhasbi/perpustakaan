<!DOCTYPE html>
<html>
<head>
	<title>Anggota</title>
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
			<th>ID anggota</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>NIM</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php
		require_once "core/init.php";
		$query	= "SELECT * FROM anggota ORDER BY id_anggota";
		$hasil	= mysqli_query($koneksi, $query);

		while($row = mysqli_fetch_assoc($hasil)){
			echo "<tr>";
			echo "<td>" . $row['id_anggota'] . "</td>";
			echo "<td>" . $row['nama'] . "</td>";
			echo "<td>" . $row['alamat'] . "</td>";
			echo "<td>" . $row['nim'] . "</td>";
			echo "<td>" . $row['status_anggota'] . "</td>";
			echo "</tr>";
		}
		?>
	</tbody>
</table>

<a href="input_anggota.php">Tambah Anggota</a>

</body>
</html>