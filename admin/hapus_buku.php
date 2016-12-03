<!DOCTYPE html>
<html>
<head>
	<title>Hapus Buku</title>
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
global $koneksi;

if(isset($_POST['hapus'])){
	$judul = $_POST['judul'];
	$url   = strtolower(str_replace(" ", "-", $judul)); //ubah judul menjadi kecil dan ganti spasi => -
	$file  = "../buku/".$url.".html";

	if(hapus_buku($judul) && unlink($file)){
		echo "Buku berjudul $judul berhasil dihapus.";
	} else {
		echo "Buku berjudul $judul gagal dihapus";
	}
} else if(isset($_POST['kurang'])){
	$judul = $_POST['judul'];
	$jumlah= $_POST['jumlah'];

	if(kurangi_buku($judul,$jumlah)){
		echo "Buku berjudul $judul berhasil dikurangi sebanyak $jumlah buah.";
	} else {
		echo "Buku berjudul $judul gagal dikurangi.";
	}
}
?>

<form action="hapus_buku.php" method="POST">
	<table>
		<tr>
			<td>Judul</td>
			<td>
				<select name="judul">
					<?php
					$query = "SELECT * FROM buku";
					$hasil = mysqli_query($koneksi, $query);
					while($row = mysqli_fetch_assoc($hasil)){
					?>
					<option value="<?php echo $row['judul']; ?>"><?php echo $row['judul'];?></option>
					<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td>
				<select name="jumlah">
					<?php
					pilihan(20); //sebelum pilihan() harus ada <select name="..."> || function/fungsi.php
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><input type="submit" name="hapus" value="HAPUS"/></td>
			<td><input type="submit" name="kurang" value="KURANGI"/></td>
		</tr>
	</table>
</form>
</body>
</html>