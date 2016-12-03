<!DOCTYPE html>
<html>
<head>
	<title>Hapus Anggota</title>
	<link rel="stylesheet" href="../view/main.css"/>
</head>
<body>
<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="hapus_buku.php">Hapus Buku</a></li>
	<li><a href="hapus_anggota.php">Hapus Anggota</a></li>
	<li><a href="input_buku.php">Tambah Buku</a></li>
</ul>

<?php
require_once "init.php";

if(isset($_POST['submit'])){
	$nama = $_POST['nama'];

	if(hapus_anggota($nama)){
		echo "Berhasil menghapus $nama";
	} else {
		echo "Gagal menghapus $nama";
	}
	echo "<br><br>";
}
?>
<form action="hapus_anggota.php" method="POST">
	<table>
		<tr>
			<td>Nama</td>
			<td>
				<select name="nama">
					<?php
					$query = "SELECT * FROM anggota";
					$hasil = mysqli_query($koneksi, $query);
					while($row = mysqli_fetch_assoc($hasil)){
					?>

					<option value="<?php echo $row['nama']?>"><?php echo $row['id_anggota'] . ". " . $row['nama'] ?></option>

					<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="HAPUS"></td>
		</tr>
	</table>
</form>

</body>
</html>