<!DOCTYPE html>
<html>
<head>
	<title>Pengembalian Buku</title>
	<link rel="stylesheet" href="view/main.css"/>
</head>
<body>
	<?php
	require_once "core/init.php";
	$query = "UPDATE meminjam SET kembali = 1 WHERE id_pinjam = '$_GET[id]'";

	if(mysqli_query($koneksi, $query)){
		echo "Buku berhasil dikembalikan";
	} else {
		echo "Buku gagal dikembalikan";
	}
	?>
</body>
</html>