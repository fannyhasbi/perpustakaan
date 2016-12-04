<?php
function daftar_anggota($n_depan,$n_belakang,$alamat,$nim,$status){
	global $koneksi;
	$n_depan		= mysqli_real_escape_string($koneksi, $n_depan);
	$n_belakang = mysqli_real_escape_string($koneksi, $n_belakang);
	$alamat 		= mysqli_real_escape_string($koneksi, $alamat);
	$nim				= mysqli_real_escape_string($koneksi, $nim);
	$status 		= mysqli_real_escape_string($koneksi, $status);

	$query	= "INSERT INTO anggota (n_depan,n_belakang,alamat,nim,status_anggota) VALUES ('$n_depan','$n_belakang','$alamat', '$nim', $status)";

	if(mysqli_query($koneksi,$query)){
		return true;
	} else {
		return false;
	}
}

function anggota_kembar($nim){
	global $koneksi;
	$nim = mysqli_real_escape_string($koneksi, $nim);

	$query = "SELECT nim FROM anggota WHERE nim = '$nim'";
	$hasil = mysqli_query($koneksi, $query);

	if($row = mysqli_num_rows($hasil) == 0){
		return true;
	} else {
		return false;
	}
}

function anggota_ada($nim){
	global $koneksi;
	$nim = mysqli_real_escape_string($koneksi, $nim);

	$query = "SELECT nim FROM anggota WHERE nim = '$nim'";
	$hasil = mysqli_query($koneksi, $query);

	if($row = mysqli_num_rows($hasil) == 0){
		return false; //jika akun tidak ditemukan
	} else {
		return true;
	}
}

function login($nama,$nim){
	global $koneksi;
	$nama = strtolower(mysqli_real_escape_string($koneksi,$nama));
	$nim 	= mysqli_real_escape_string($koneksi,$nim);
	$query_nama = "SELECT * FROM anggota WHERE n_depan = '$nama' AND nim = '$nim'";
	$hasil = mysqli_query($koneksi,$query_nama);

	$s = mysqli_fetch_assoc($hasil);
	if($nama == strtolower($s['n_depan']) && $nim == $s['nim']){
		$_SESSION['login'] = true;
		$_SESSION['nama'] = $s['n_depan']." ".$s['n_belakang'];
		$_SESSION['id_anggota'] = $s['id_anggota'];
		header("Location: ./");
	} else {
		echo "<div class='alert alert-warning'>Gagal login.</div>";
	}
}

function pinjam_login(){ //berguna di halaman buku.php
	if(isset($_SESSION['login'])){
		echo "buku.php";
	} else {
		echo "login.php";
	}
}
function daftar_buku($judul,$pengarang,$jenis,$penerbit,$jumlah,$konten){
	global $koneksi;
	$judul		= mysqli_real_escape_string($koneksi, $judul);
	$pengarang	= mysqli_real_escape_string($koneksi, $pengarang);
	$jenis		= mysqli_real_escape_string($koneksi, $jenis);
	$penerbit	= mysqli_real_escape_string($koneksi, $penerbit);
	$jumlah		= mysqli_real_escape_string($koneksi, $jumlah);
	$konten		= mysqli_real_escape_string($koneksi, $konten);

	$query = "INSERT INTO buku (judul,pengarang,jenis_buku,penerbit,jumlah,konten) VALUES ('$judul', '$pengarang', '$jenis', '$penerbit', $jumlah, '$konten')";
	if(mysqli_query($koneksi, $query)){
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

function buku_sama($judul){
	global $koneksi;
	$judul = mysqli_real_escape_string($koneksi, $judul);

	$query = "SELECT judul FROM buku WHERE judul = '$judul'";
	$hasil = mysqli_query($koneksi, $query);

	if(mysqli_num_rows($hasil) == 0){
		return true;
	} else {
		return false;
	}
}

function hapus_anggota($nim){
	global $koneksi;
	$nim = mysqli_real_escape_string($koneksi, $nim);
	$query= "DELETE FROM anggota WHERE nim = '$nim'";

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
