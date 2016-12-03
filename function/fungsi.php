<?php
function daftar_anggota($nama,$alamat,$nim,$status){
	global $koneksi;
	$nama	= mysqli_real_escape_string($koneksi, $nama);
	$alamat = mysqli_real_escape_string($koneksi, $alamat);
	$nim	= mysqli_real_escape_string($koneksi, $nim);
	$status = mysqli_real_escape_string($koneksi, $status);

	$query	= "INSERT INTO anggota (nama, alamat, nim, status_anggota) VALUES ('$nama', '$alamat', '$nim', $status)";

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

function hapus_anggota($nama){
	global $koneksi;
	$nama = mysqli_real_escape_string($koneksi, $nama);
	$query= "DELETE FROM anggota WHERE nama = '$nama'";

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