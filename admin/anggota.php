<?php
session_start();
require_once "core/init.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Anggota</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../view/main.css"/>

	<script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-fixed-top navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<a href="index.php" class="navbar-brand">PERPUS ONLINE</a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigasi">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse" id="navigasi">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="anggota.php">ANGGOTA</a></li>
				<li><a href="input_buku.php">TAMBAH BUKU</a></li>
				<li><a href="hapus_buku.php">HAPUS BUKU</a></li>
				<?php
				if(isset($_SESSION['login-adm'])){
					echo "<li><a href='logout.php'>LOGOUT</a></li>";
				} else echo "<li><a href='login.php'>LOGIN</a></li>";
				?>
			</ul>
		</div>
	</div>
</nav>

<div class="container-fluid" id="nonaktif">
	<div class="row text-center">
		<div class="col-md-6">
			<h2 class="text-center margin-md">Nonaktifkan Anggota</h2>
			<form action="anggota.php" method="POST">
				<div class="form-group">
					<label for="nama_anggota">Nama:</label>
					<select name="non_nim">
						<option value="">----- Pilih Anggota -----</option>
						<?php
						$query = "SELECT * FROM anggota WHERE status_anggota = 1 ORDER BY n_depan";
						$hasil = mysqli_query($koneksi,$query);

						while($r = mysqli_fetch_assoc($hasil)){
						?>
						<option value="<?php echo $r['nim'];?>"><?php echo $r['n_depan']." ".$r['n_belakang'];?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-danger" name="nonaktif" value="NONAKTIFKAN">
				</div>
				<div class="form-group">
					<?php
					if(isset($_POST['nonaktif'])){
						$non_nim = $_POST['non_nim'];

						if(!empty($_POST)){
							if($_POST['non_nim']){
								(nonaktif($non_nim));
							} else echo "<div class='alert alert-warning'>Pilih anggota untuk dinonaktifkan.</div>";
						} else echo "<div class='alert alert-warning'>Harap isi semua data dengan benar.</div>";
					}
					?>
				</div>
			</form>
		</div> <!-- Akhir dari bagian nonaktif -->
		<div class="col-md-6">
			<h2 class="text-center margin-md">Aktifkan Anggota</h2>
			<form action="anggota.php" method="POST">
				<div class="form-group">
					<label for="nama">Nama: </label>
					<select name="akt_nim">
						<option value="">----- Pilih Anggota -----</option>
						<?php
						$q = "SELECT * FROM anggota WHERE status_anggota = 0 ORDER BY n_depan";
						$h = mysqli_query($koneksi,$q);

						while($s = mysqli_fetch_assoc($h)){
						?>
						<option value="<?php echo $s['nim'];?>"><?php echo $s['n_depan'] ." ". $s['n_belakang']; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-success" name="aktif" value="AKTIFKAN">
				</div>
				<div class="form-group">
					<?php
					if(isset($_POST['aktif'])){
						$akt_nim = $_POST['akt_nim'];

						if(!empty($_POST)){
							if($_POST['akt_nim']){
								aktif($akt_nim);
							} else echo "<div class='alert alert-warning'>Pilih anggota untuk dinonaktifkan.</div>";
						} else echo "<div class='alert alert-warning'>Harap isi semua data dengan benar.</div>";
					}
					?>
				</div>
			</form>
		</div>
	</div>
</div>


</body>
</html>