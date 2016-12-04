<?php
function login_admin($username,$pass){
	global $koneksi;
	$username = mysqli_real_escape_string($koneksi,$username);
	$pass			= mysqli_real_escape_string($koneksi,$pass);
	$query = "SELECT * FROM admin WHERE username = '$username' AND pass = '$pass'";
	$hasil = mysqli_query($koneksi,$query);
	$r = mysqli_fetch_assoc($hasil); //keperluan informasi
	
	if(mysqli_num_rows($hasil) == 1){
		$_SESSION['login-adm'] = true;
		$_SESSION['nama-adm'] = $r['n_depan']. " " . $r['n_belakang'];
		header("Location: index.php");
	} else {
		echo "<div class='alert alert-warning'>Password salah.</div>";
	}
}

function admin_ada($username){
	global $koneksi;
	$username = mysqli_real_escape_string($koneksi,$username);
	$query = "SELECT username FROM admin WHERE username = '$username'";
	$hasil = mysqli_query($koneksi,$query);

	if(mysqli_num_rows($hasil) == 0){
		return false;
	} else {
		return true;
	}
}

function nonaktif($nim){
	global $koneksi;
	$nim  = mysqli_real_escape_string($koneksi,$nim);
	$query= "UPDATE anggota SET status_anggota = 0 WHERE nim = '$nim'";
	$query_info = "SELECT * FROM anggota WHERE nim = '$nim'";
	$info = mysqli_query($koneksi,$query_info);
	$r 		= mysqli_fetch_assoc($info);
	
	if(mysqli_query($koneksi,$query)){
		echo "<div class='alert alert-success'>". $r['n_depan'] ." ". $r['n_belakang'] ." dengan NIM ". $r['nim'] ." berhasil dinonaktifkan.</div>";
	} else {
		echo "<div class='alert alert-warning'>". $r['n_depan'] ." ". $r['n_belakang'] ." gagal dinonaktifkan.</div>";
	}
}
?>