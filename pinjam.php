<?php
session_start();
require_once "core/init.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pinjam Buku</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="view/main.css"/>

	<script src="bootstrap/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<?php include "view/nav.php";?>

<div class="container-fluid">
	<?php
	if(isset($_GET['id']) && isset($_GET['title'])){
		$tgl = date("Y-m-d");
		$query = "UPDATE meminjam SET kembali=1, tgl_kembali = '$tgl' WHERE id_pinjam = '$_GET[id]'";

		if(mysqli_query($koneksi, $query)){
			echo "<div class='alert alert-success'>" . $_SESSION['nama']. " berhasil mengembalikan buku berjudul " . $_GET['title'] . "</div>";
		} else {
			echo "<div class='alert alert-warning'>Buku berjudul " . $_GET['title'] . " gagal dikembalikan</div>";
		}
	}
	?>
	<div class="text-center margin-md">
		<h3>Buku yang belum dikembalikan</h3>
	</div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Tanggal pinjam</th>
				<th>Jumlah Pinjam</th>
				<th>Nama peminjam</th>
				<th>Buku</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			require_once "core/init.php";
			$query = "SELECT * FROM meminjam,buku,anggota WHERE meminjam.id_anggota = anggota.id_anggota AND meminjam.id_buku = buku.id_buku AND meminjam.kembali = 0 ORDER BY meminjam.tgl_pinjam DESC";
			$hasil = mysqli_query($koneksi, $query);

			while($r = mysqli_fetch_assoc($hasil)){
			?>
			<tr>
				<td><?php echo $r['tgl_pinjam']; ?></td>
				<td><?php echo $r['jumlah_pinjam']; ?></td>
				<td><?php echo $r['n_depan']." ".$r['n_belakang']; ?></td>
				<td><?php echo $r['judul']; ?></td>
				<?php
				if(isset($_SESSION['login'])){
					if($_SESSION['id_anggota'] == $r['id_anggota']){
				?>
				<td><a href="pinjam.php?id=<?php echo $r['id_pinjam'];?>&title=<?php echo $r['judul']?>">Kembalikan</a></td>
				<?php
					} else echo "<td>Tidak ada</td>";
				} else echo "<td>Tidak ada</td>";
				?>
			</tr>

			<?php
			} //akhir while buku yang belum kembali
			?>
		</tbody>
	</table>
	<br><br>

	<div class="text-center margin-md">
		<h3>Buku yang sudah dikembalikan</h3>
	</div>
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Tanggal pinjam</th>
				<th>Tanggal kembali</th>
				<th>Jumlah pinjam</th>
				<th>Nama peminjam</th>
				<th>Buku</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$query = "SELECT * FROM meminjam,anggota,buku WHERE meminjam.id_anggota = anggota.id_anggota AND meminjam.id_buku = buku.id_buku AND kembali = 1 ORDER BY meminjam.tgl_kembali DESC";
			$hasil = mysqli_query($koneksi,$query);
			while($s = mysqli_fetch_assoc($hasil)){
			?>
			<tr>
				<td><?php echo $s['tgl_pinjam']; ?></td>
				<td><?php echo $s['tgl_kembali']; ?></td>
				<td><?php echo $s['jumlah_pinjam']; ?></td>
				<td><?php echo $s['n_depan']." ".$s['n_belakang']; ?></td>
				<td><?php echo $s['judul']; ?></td>
			</tr>
			<?php
			} // akhir while buku yg sudah kembali
			?>
		</tbody>
	</table>
</div>

<footer class="container-fluid text-center">
	<p>Copyright &copy; 2016 <a href="https://github.com/fannyhasbi/">Fanny Hasbi</a></p>
</footer>
</body>
</html>