<?php
session_start();
require_once "core/init.php";
if(!isset($_SESSION['login'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Menjadi Anggota</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="view/main.css"/>

	<script src="bootstrap/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
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
				<li><a href="buku.php">BUKU</a></li>
				<li><a href="pinjam.php">PINJAM</a></li>
				<?php
				if(isset($_SESSION['login'])){
					echo "<li><a href='logout.php'>LOGOUT</a></li>";
				} else echo "<li><a href='login.php'>LOGIN</a></li>";
				?>
			</ul>
		</div>
	</div>
</nav>

<div class="container-fluid">
	<h2 class="text-center margin-md">Daftar Menjadi Anggota</h2>
	<form class="form-horizontal" action="daftar.php" method="POST" style="padding-right:100px;">
		<div class="form-group">
			<label class="control-label col-sm-2" for="n_depan">Nama depan: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="n_depan" placeholder="Nama depan">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="n_belakang">Nama belakang: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="n_belakang" placeholder="Nama belakang">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="nim">NIM: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="nim" placeholder="1600..">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="alamat">Alamat: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="alamat" placeholder="Alamat">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-primary" name="submit" value="DAFTAR">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<?php
				if(isset($_POST['submit'])){
					$n_depan		= $_POST['n_depan'];
					$n_belakang	= $_POST['n_belakang'];
					$nim 				= $_POST['nim'];
					$alamat 		= $_POST['alamat'];
					$status = 1;

					if(!empty($_POST)){
						if($_POST['n_depan'] || $_POST['n_belakang']){
							if($_POST['nim']){
								if($_POST['alamat']){
									if(anggota_kembar($nim)){
										if(daftar_anggota($n_depan,$n_belakang,$alamat,$nim,$status)){
											echo "<div class='alert alert-success'><strong>Selamat</strong>, ".$_POST['n_depan']." berhasil terdaftar</div>";
										} else echo "<div class='alert alert-danger'><strong>Pendaftaran gagal</strong>, terjadi kesalahan database.</div>";
									} else echo "<div class='alert alert-warning'>NIM :".$_POST['nim']." sudah terdaftar.</div>";
								} else echo "<div class='alert alert-warning'>Alamat tidak boleh kosong.</div>";
							} else echo "<div class='alert alert-warning'>NIM tidak boleh kosong.</div>";
						} else echo "<div class='alert alert-warning'>Nama tidak boleh kosong.</div>";
					} else echo "<div class='alert alert-danger'>Harap isi semua data dengan benar.</div>";
				}
				?>
			</div>
		</div>
	</form>
</div>

<script>
$(document).ready(function(){
	$("div.alert").fadeOut(10000);
});
</script>
</body>
</html>
<?php
} else header("Location: ./");
?>