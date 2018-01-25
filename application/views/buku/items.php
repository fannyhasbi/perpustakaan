<!DOCTYPE html>
<html>
<head>
	<title><?php echo $buku['judul_buku']; ?></title>
	<meta charset="utf-8">
</head>
<body>
	<h1 style="text-align: center;"><?php echo $buku['judul_buku']; ?></h1>
	<table>
		<tr>
			<td><label for="pengarang">Pengarang</label></td>
			<td><p>: <?php echo $buku['pengarang']; ?></p></td>
		</tr>
		<tr>
			<td><label for="jumlah">Jumlah</label></td>
			<td><p>: <?php echo $buku['jumlah']; ?></p></td>
		</tr>
	</table>

	<p><?php echo $buku['deskripsi']; ?></p>

</body>
</html>