<!DOCTYPE html>
<html>
<head>
	<title>Perpustakaan</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="view/main.css"/>

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
			</ul>
		</div>
	</div>
</nav>

<header id="header">
	<div class="vertical-center">
		<h1>Selamat Datang di Aplikasi Perpustakaan</h1>
		<h3>Created by Fanny Hasbi</h3>
		<br><br><br>
		<div class="row">
			<div class="col-sm-6">
				<a href="login.php">
					<div class="btn btn-default vertical-center">LOGIN</div>
				</a>
			</div>
			<div class="col-sm-6">
				<a href="daftar.php">
					<div class="btn btn-default vertical-center">DAFTAR</div>
				</a>
			</div>
		</div>
	</div>
</header>

</body>
</html>
