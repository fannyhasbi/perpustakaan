<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Perpustakaan</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="view/main.css"/>

	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<?php include "view/nav.php";?>

<header id="header" class="index">
	<div class="vertical-center">
		<?php
		if(isset($_SESSION['login'])){
		?>

		<h1>Selamat datang, <?php echo $_SESSION['nama']; ?></h1>

		<?php
		} else {
		?>

		<div class="row">
			<div class="col-md-6">
				<h1>PERPUSTAKAAN<br>ONLINE</h1>
				<h4>Kemudahan dalam peminjaman buku secara online.</h4>
				<br>
				<div class="row">
					<div class="col-md-6">
						<a href="buku.php">
							<div class="btn btn-index vertical-center text-center">BUKU</div>
						</a>
					</div>
					<div class="col-md-6">
						<a href="login.php">
							<div class="btn btn-index vertical-center text-center">LOGIN</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-6"></div>
		</div>

		<?php
		}
		?>
	</div>
</header>

</body>
</html>