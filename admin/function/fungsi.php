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
		echo "Password salah.";
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

function aktif($nim){
	global $koneksi;
	$nim  = mysqli_real_escape_string($koneksi,$nim);
	$query= "UPDATE anggota SET status_anggota = 1 WHERE nim = '$nim'";
	$query_info = "SELECT * FROM anggota WHERE nim = '$nim'";
	$info = mysqli_query($koneksi,$query_info);
	$r 		= mysqli_fetch_assoc($info);

	if(mysqli_query($koneksi,$query)){
		echo "<div class='alert alert-success'>". $r['n_depan'] ." ". $r['n_belakang'] ." dengan NIM ". $r['nim'] ." berhasil diaktifkan kembali.</div>";
	} else {
		echo "<div class='alert alert-warning'>". $r['n_depan'] ." ". $r['n_belakang'] ." gagal diaktifkan kembali.</div>";
	}
}

function daftar_buku($judul,$pengarang,$jenis,$penerbit,$jumlah,$alamat,$konten){
	global $koneksi;
	$judul		= mysqli_real_escape_string($koneksi, $judul);
	$pengarang= mysqli_real_escape_string($koneksi, $pengarang);
	$jenis		= mysqli_real_escape_string($koneksi, $jenis);
	$penerbit	= mysqli_real_escape_string($koneksi, $penerbit);
	$jumlah		= mysqli_real_escape_string($koneksi, $jumlah);
	$konten		= mysqli_real_escape_string($koneksi, $konten);
	$alamat 	= mysqli_real_escape_string($koneksi, $alamat);

	$query = "INSERT INTO buku (judul,pengarang,jenis_buku,penerbit,jumlah,alamat,konten) VALUES ('$judul', '$pengarang', '$jenis', '$penerbit', $jumlah, '$alamat','$konten')";
	if(mysqli_query($koneksi, $query)){
		return true;
	} else {
		return false;
	}
}

function buku_sama($judul,$pengarang,$penerbit){
	global $koneksi;
	$judul 		 = strtolower(mysqli_real_escape_string($koneksi,$judul));
	$pengarang = mysqli_real_escape_string($koneksi,$pengarang);
	$penerbit  = mysqli_real_escape_string($koneksi,$penerbit);

	$query = "SELECT * FROM buku WHERE judul = '$judul' AND pengarang = '$pengarang' AND penerbit = '$penerbit'";
	$hasil = mysqli_query($koneksi, $query);

	if(mysqli_num_rows($hasil) == 0){
		return true;
	} else {
		return false;
	}
}

function tambah_buku($judul,$jumlah){
	global $koneksi;
	$judul	= mysqli_real_escape_string($koneksi, $judul);
	$jumlah = mysqli_real_escape_string($koneksi, $jumlah);

	$query = "UPDATE buku SET jumlah = jumlah + $jumlah WHERE judul = '$judul'";
	if(mysqli_query($koneksi, $query)){
		return true;
	} else {
		return false;
	}
}

function hapus_buku($judul){
	global $koneksi;
	$judul = mysqli_real_escape_string($koneksi, $judul);
	$query = "DELETE FROM buku WHERE judul = '$judul'";

	if(mysqli_query($koneksi, $query)){
		return true;
	} else {
		return false;
	}
}

function kurangi_buku($judul,$jumlah){
	global $koneksi;
	$judul = mysqli_real_escape_string($koneksi, $judul);
	$jumlah= mysqli_real_escape_string($koneksi, $jumlah);
	$query = "UPDATE buku SET jumlah = jumlah - $jumlah WHERE judul = '$judul'";

	if(mysqli_query($koneksi, $query)){
		return true;
	} else {
		return false;
	}
}

function pilihan($x){
	for($i=1; $i<=$x; $i++){
		echo "<option value='$i'>$i</option>";
	}
}
?>