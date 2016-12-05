<?php
session_start();
//require_once "core/init.php"; <- tidak digunakan agar tidak konflik
//diganti dengan require_once setiap file di folder function/
require_once "function/db.php";
require_once "function/fungsi.php";

if(!isset($_SESSION['login'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Anggota</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
	<style type="text/css">
		body, html {
			height: 100%;
		}
		body {
			background-color: #0090bd;
		}
		#formulir {
			max-width: 350px;
			margin: 5% auto 25px;
			background-color: #FAFAFA;
			padding: 40px;
			border-radius: 10px 10px 2px 2px;
		}
		.img {
			margin: 5px auto 20px;
		}
		img {
			max-width: 150px;
			max-height: 150px;
		}
		.form-control,
		label {
			margin-bottom: 10px;
			width: 100%;
		}
		.warning {
			margin: 10px auto;
			padding: 10px;
			color: #FF2800;
		}
	</style>

	<script src="bootstrap/jquery.min.js"></script>
</head>
<body>

<div class="container">
	<div id="formulir">
		<div class="img text-center">
			<img src="https://cdn2.iconfinder.com/data/icons/users-2/512/User_6-512.png" class="img-circle"/>
		</div>
		<form action="login.php" method="POST">
			<input type="text" class="form-control" placeholder="Nama Depan" name="nama" required autofocus>
			<input type="text" class="form-control" placeholder="NIM" name="nim" required>
			<input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="LOGIN">
		</form>
		<div class="warning">
			<?php
			if(isset($_POST['submit'])){
				$nama = strtolower($_POST['nama']);
				$nim  = $_POST['nim'];
				$cek = new Anggota;

				if(!empty($_POST)){
					if($_POST['nama']){
						if($_POST['nim']){
							if($cek->nama_ada($nama)){
								if($cek->nim_ada($nim)){
									if($cek->cek_status($nama,$nim)){
										$cek->login($nama,$nim);
									} else echo "Maaf, akun dengan NIM $nim sudah dinonaktifkan.";
								} else echo "Maaf, nim $nim tidak terdaftar.";
							} else echo "Maaf, nama $nama tidak terdaftar.";
						} else echo "NIM tidak boleh kosong.";
					} else echo "Nama tidak boleh kosong.";
				} else echo "Harap isi semua data dengan benar.";
			}
			?>
		</div>
		<br>
		<div class="row text-center">
			<div class="col-sm-6">
				<a href="index.php">Home</a>
			</div>
			<div class="col-sm-6">
				<a href="daftar.php">Daftar</a>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	$("#formulir").hide().fadeIn(2000);
});
</script>
</body>
</html>
<?php
} else header("Location: ./");
?>