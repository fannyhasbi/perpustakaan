<!DOCTYPE html>
<html>
<head>
	<title>Administrator</title>
	<link rel="stylesheet" href="../view/main.css"/>
</head>
<body>
<h1>Halaman Administrator</h1>
<?php
require_once "init.php";

if(!isset($_POST['submit'])){
?>

<form action="index.php" method="POST">
	<table>
		<tr>
			<td>Nama</td>
			<td><input type="text" name="username"/></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="pass"/></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name="submit" value="login"/></td>
		</tr>
	</table>
</form>

<?php
} else {
	$user = $_POST['username'];
	$pass = $_POST['pass'];

	if($user == "admin" && $pass == "hasbi"){
?>

<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="hapus_buku.php">Hapus Buku</a></li>
	<li><a href="hapus_anggota.php">Hapus Anggota</a></li>
	<li><a href="input_buku.php">Tambah Buku</a></li>
</ul>

<?php
		echo "Hello $user";
	} else {
		echo "Password salah.";
	}
}
?>
</body>
</html>