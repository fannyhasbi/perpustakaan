<?php
session_start();
require_once "core/init.php";
if(!isset($_SESSION['login'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Anggota</title>
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
	<h2 class="text-center margin-md">Login Anggota</h2>
	<form class="form-horizontal" action="login.php" method="POST" style="margin-right:100px;">
		<div class="form-group">
			<label class="control-label col-sm-2" for="nama">Nama depan: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="nama">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2" for="nim">NIM: </label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="nim">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" class="btn btn-primary" name="submit" value="LOGIN">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<?php
				if(isset($_POST['submit'])){
					$nama = strtolower($_POST['nama']);
					$nim  = $_POST['nim'];

					if(!empty($_POST)){
						if($_POST['nama']){
							if($_POST['nim']){
								if(anggota_ada($nim)){
									login($nama,$nim);
								} else echo "<div class='alert alert-warning'>NIM:".$_POST['nim']." tidak terdaftar.";
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
	$("div.alert").fadeOut(7000);
});
</script>
</body>
</html>
<?php
} else header("Location: ./");
?>