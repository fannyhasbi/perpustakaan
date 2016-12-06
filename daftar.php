<?php
session_start();
//require_once "core/init.php"; <- tidak digunakan untuk mencegah konflik jika belum login
require_once "function/db.php";
require_once "function/fungsi.php";
if(isset($_SESSION['login'])){
	header("Location: ./");
} else {
?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Menjadi Anggota</title>
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
		.notif {
			max-width: 420px;
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

<?php include "view/nav.php";?>

<div class="container">
	<?php
	if(isset($_SESSION['suc'])){ //jika sudah submit form
		if($_SESSION['suc'] == 1){ //jika berhasil daftar
	?>
	<div class="notif">
		<div class="img text-center">
			<img src="https://cdn3.iconfinder.com/data/icons/basic-flat-svg/512/svg14-512.png" class="img-circle"/>
		</div>
		<div class="success">
			<h2>Selamat, Anda berhasil terdaftar</h2>
		</div>
		<table class="table">
			<?php
			$nim_daftar = $_GET['nim'];
			$query = "SELECT * FROM anggota WHERE nim = '$nim_daftar'";
			$hasil = mysqli_query($koneksi,$query);
			$r = mysqli_fetch_assoc($hasil);
			?>
			<tr>
				<td>Nama lengkap</td>
				<td><?php echo $r['n_depan'] ." ". $r['n_belakang'];?></td>
			</tr>
			<tr>
				<td>NIM</td>
				<td><?php echo $r['nim'];?></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td><?php echo $r['alamat'];?></td>
			</tr>
		</table>
		<br>
		<a href="login.php" class="btn btn-lg btn-primary btn-block">Login</a>
	</div>

	<?php
		} //akhir dari if($_GET['suc'] == 1)
		else {
	?>

	<div class="notif">
		<div class="img text-center">
			<img src="https://freeiconshop.com/files/edd/cross-flat.png" class="img-circle"/>
		</div>
		<div class="success">
			<h2>Pendaftaran Gagal</h2>
			<p>Terjadi kesalahan tak terduga, mohon coba beberapa saat lagi.</p>
		</div>
		<br>
		<div class="row text-center">
			<div class="col-sm-6">
				<a href="index.php">Home</a>
			</div>
			<div class="col-sm-6">
				<a href="buku.php">Buku</a>
			</div>
		</div>
	</div>

	<?php
		} //akhir else dari if($_GET['suc'] == 1)
	} //akhir dari if(isset($_GET['suc']))
	else {
	?>

	<div id="formulir">
		<div class="img text-center">
			<img src="https://easyabns.com.au/assets/1401090891_pen_paper_business_equipment_tools_flat_icon_symbol-1da5a7b70ef40bb33e22cf1c85bbf391046b04d2813174b158f38e2036f4c504.png" class="img-circle" alt="Pendaftaran Perpustakaan Online" title="Pendaftaran"/>
		</div>
		<form action="daftar.php" method="POST">
			<input type="text" class="form-control" placeholder="Nama Depan" name="n_depan" required autofocus>
			<input type="text" class="form-control" placeholder="Nama Belakang" name="n_belakang" required>
			<input type="text" class="form-control" placeholder="NIM" name="nim" required>
			<input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
			<input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="DAFTAR">
		</form>
		<div class="warning">
			<?php
			if(isset($_POST['submit'])){
				$n_depan		= $_POST['n_depan'];
				$n_belakang	= $_POST['n_belakang'];
				$nim 				= $_POST['nim'];
				$alamat 		= $_POST['alamat'];
				$status = 1; // otomatis langsung aktif

				if(!empty($_POST)){
					if($_POST['n_depan'] || $_POST['n_belakang']){
						if($_POST['nim']){
							if($_POST['alamat']){
								if(anggota_kembar($nim)){
									daftar_anggota($n_depan,$n_belakang,$alamat,$nim,$status);//akan dieksekusi dengan session
								} else echo "NIM :".$_POST['nim']." sudah terdaftar.";
							} else echo "Alamat tidak boleh kosong.";
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
				<a href="login.php">Login</a>
			</div>
		</div>
	</div>

	<?php
	} //akhir else dari if(isset($_GET['suc']))
	?>
</div>

<script>
$(document).ready(function(){
	$("#formulir").hide().fadeIn(2000);
});
</script>
</body>
</html>
<?php
} //akhir else dari if(isset($_SESSION['login']))
?>