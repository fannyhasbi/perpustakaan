<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Proses Peminjaman</title>
	<link rel="stylesheet" href="view/main.css"/>
</head>
<body>
<?php
require_once "core/init.php";
$tgl = date("Y-m-d");

if(isset($_POST['submit'])){
	$id_anggota = $_POST['id_anggota'];
	$id_buku	= $_POST['id_buku'];
	$q = "INSERT INTO meminjam (tgl_pinjam,jumlah_pinjam,id_anggota,id_buku) VALUES ('$tgl',1,'$id_anggota',$id_buku)";
	$h = mysqli_query($koneksi, $q);

	if($h){
		echo "Berhasil meminjam";
	} else {
		echo "Gagal meminjam";
	}
} else {
	$id_buku = $_GET['id_buku'];
?>

<form action="proses_pinjam.php" method="POST">
	<table>
		<tr>
			<td>Judul buku </td>
			<td>
				<select name="id_buku">
					<?php
					$q_buku = "SELECT * FROM buku";
					$hasil_buku = mysqli_query($koneksi, $q_buku);
					while($s = mysqli_fetch_assoc($hasil_buku)){
					?>
					<option value="<?php echo $s['id_buku'];?>" <?php if($s['id_buku']==$id_buku){echo"selected";} ?>><?php echo $s['judul'];?></option>
					<?php
					}
					?>
				</select>
			</td>

		</tr>
		<tr>
			<td>Nama peminjam </td>
			<td>
				<select name="id_anggota">
					<?php
					$query = "SELECT * FROM anggota";
					$hasil = mysqli_query($koneksi, $query);

					while($r = mysqli_fetch_assoc($hasil)){
					?>
					<option value="<?php echo $r['id_anggota'];?>"><?php echo $r['nama'];?></option>
					<?php
					}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="PINJAM"/></td>
		</tr>
	</table>
</form>
<?php
} // akhir if(isset($_POST['submit']))
?>
</body>
</html>