<?php
session_start();
//require_once "core/init.php"; <- tidak digunakan untuk mencegah konflik karena belum login
require_once "function/db.php";
require_once "function/fungsi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Buku</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="view/main.css"/>

	<script src="bootstrap/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<?php include "view/nav.php";?>

<div class="container-fluid">
	<div class="text-center margin-md">
		<h3>Daftar Buku</h3>
	</div>
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>ID Buku</th>
				<th>Judul</th>
				<th>Pengarang</th>
				<th>Jenis Buku</th>
				<th>Penerbit</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$query = "SELECT * FROM buku ORDER BY id_buku";		
			$hasil = mysqli_query($koneksi, $query);
			$no = 1;

			while($row = mysqli_fetch_assoc($hasil)){
				$file = "buku/" . $row['alamat'];
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $row['id_buku']; ?></td>
				<td><a href="<?php echo $file; ?>"><?php echo $row['judul']; ?></a></td>
				<td><?php echo $row['pengarang']; ?></td>
				<td><?php echo $row['jenis_buku']; ?></td>
				<td><?php echo $row['penerbit']; ?></td>
			</tr>
			<?php
				$no++;
			}
			?>
		</tbody>
	</table>

	<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#pinjam" title="Pinjam">PINJAM</a>

	<!-- Panel Modal -->
	<div class="modal fade" id="pinjam" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title text-center">Pinjam Buku</h4>
				</div>
				<div class="modal-body">
					<form action="<?php pinjam_login();?>" method="POST">
						<div class="form-group">
							<label for="buku">Buku:</label>
							<select class="form-control" name="id_buku">
								<?php
								$q_buku = "SELECT * FROM buku";
								$hasil_buku = mysqli_query($koneksi, $q_buku);
								while($s = mysqli_fetch_assoc($hasil_buku)){
								?>
								<option value="<?php echo $s['id_buku'];?>"><?php echo $s['judul'];?></option>
								<?php
								}
								?>
							</select>
						</div>
						<br>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" name="pinjam" value="PINJAM">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn default btn-warning" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div> <!-- akhir modal -->

	<!-- Panel jika meminjam dilakukan -->
	<?php
	if(isset($_POST['pinjam'])){
	?>
	
	<div class="modal fade" id="proses-pinjam">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title text-center">PEMINJAMAN</h4>
				</div>
				<div class="modal-body">
					<div class="vertcial-center">
						<?php
						$tgl = date("Y-m-d");

						$id_anggota = $_SESSION['id_anggota'];
						$id_buku	= $_POST['id_buku'];
						$q = "INSERT INTO meminjam (tgl_pinjam,jumlah_pinjam,id_anggota,id_buku) VALUES ('$tgl',1,'$id_anggota',$id_buku)";

						if(mysqli_query($koneksi, $q)){
							echo "<div class='alert alert-success'>". $_SESSION['nama'] ." Berhasil meminjam buku</div>";
						} else {
							echo "<div class='alert alert-warning'>Terjadi kesalahan saat proses peminjaman, coba beberapa saat lagi.</div>";
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	} // akhir isset($_POST['pinjam'])
	?>

</div> <!-- akhir container-fluid -->

<footer class="container-fluid text-center">
	<p>Copyright &copy; 2016 <a href="https://github.com/fannyhasbi/">Fanny Hasbi</a></p>
</footer>

<script>
$(document).ready(function(){
	$("#panel-pinjam").hide().fadeIn(1500);
	$(window).load(function(){
		$("#proses-pinjam").modal("show");
	});
});
</script>
</body>
</html>