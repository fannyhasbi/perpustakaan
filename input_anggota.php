<!DOCTYPE html>
<html>
<head>
	<title>Tambah Anggota</title>
	<link rel="stylesheet" href="view/main.css"/>
</head>
<body>
<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="anggota.php">Anggota</a></li>
	<li><a href="buku.php">Buku</a></li>
	<li><a href="pinjam.php">Pinjam</a></li>
</ul>

<?php
require_once "core/init.php";

if(isset($_POST['submit'])){
	$nama 	= $_POST['nama'];
	$alamat = $_POST['alamat'];
	$nim 	= $_POST['nim'];
	$status = 1;

	if(anggota_kembar($nim)){
		if(daftar_anggota($nama,$alamat,$nim,$status)){
			echo "Berhasil daftar";
		} else {
			echo "Gagal daftar";
		}
	} else {
		echo "Gagal daftar, NIM sudah terdaftar";
	}
	
} else {
?>

<form action="input_anggota.php" method="POST">
	<table>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="nama"></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><input type="text" name="alamat"></td>
		</tr>
		<tr>
			<td>NIM</td>
			<td><input type="text" name="nim"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="TAMBAH"></td>
		</tr>
	</table>
</form>
<?php
}
?>
</body>
</html>