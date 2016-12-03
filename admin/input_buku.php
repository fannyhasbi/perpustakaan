<!DOCTYPE html>
<html>
<head>
	<title>Tambah Buku</title>
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
	$judul 		= $_POST['judul'];
	$pengarang  = $_POST['pengarang'];
	$jenis 		= $_POST['jenis'];
	$penerbit 	= $_POST['penerbit'];
	$jumlah 	= $_POST['jumlah'];
	$konten		= $_POST['konten'];

	//awal persiapan pembuatan halaman sinopsis
	$data = array($judul,$pengarang,$penerbit,$jenis,$konten);
	$tpl_file = "sinopsis.html"; //file template
	$tpl_path = "../template/"; //lokasi template
	$buku_path= "../buku/"; //lokasi halaman baru yang akan dibuat

	$placeholders = array("{judul}","{pengarang}","{penerbit}","{jenis}","{konten}");
	$tpl = file_get_contents($tpl_path.$tpl_file);
	$new_book = str_replace($placeholders, $data, $tpl);

	$data[0] = str_replace(" ", "-", $data[0]); //menghapus spasi pada judul
	$html_file_name = strtolower($data[0]).".html";
	//akhir persiapan pembuatan halaman sinopsis

	if(buku_sama($judul)){
		if(daftar_buku($judul,$pengarang,$jenis,$penerbit,$jumlah,$konten)){
			$fp = fopen($buku_path.$html_file_name, "w"); //buat file
			fwrite($fp, $new_book); //tulis data baru dengan mengganti data placeholder
			fclose($fp);

			echo "Berhasil mendaftarkan buku baru<br>";
		} else {
			echo "Gagal mendafarkan buku baru";
		}
	} else {
		if(tambah_buku($judul,$jumlah)){
			echo "Berhasil menambahkan $jumlah buku dengan judul $judul";
		} else {
			echo "Gagal menambahkan $jumlah buku dengan judul $judul";
		}
	}
} else {
?>

<form action="input_buku.php" method="POST">
	<table>
		<tr>
			<td>Judul</td>
			<td><input type="text" name="judul"></td>
		</tr>
		<tr>
			<td>Pengarang</td>
			<td><input type="text" name="pengarang"></td>
		</tr>
		<tr>
			<td>Jenis</td>
			<td>
				<select name="jenis">
					<option value="Komik">Komik</option>
					<option value="Novel">Novel</option>
					<option value="Tutorial">Tutorial</option>
					<option value="Majalah">Majalah</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Penerbit</td>
			<td><input type="text" name="penerbit"></td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td>
				<select name="jumlah">
					<?php pilihan(20); ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Sinopsis</td>
			<td>
				<textarea cols="30" rows="5" name="konten"></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="TAMBAH"/></td>
		</tr>
	</table>
</form>
<?php
}
?>
</body>
</html>