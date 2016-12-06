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
		$_SESSION['suc'] = 1;
		header("Location: daftar.php?nim=$nim");
	} else {
		$_SESSION['suc'] = 0;
	}
}

function anggota_kembar($nim){
	global $koneksi;
	$nim = mysqli_real_escape_string($koneksi, $nim);

	$query = "SELECT nim FROM anggota WHERE nim = '$nim'";
	$hasil = mysqli_query($koneksi, $query);

	if(mysqli_num_rows($hasil) == 0){
		return true;
	} else {
		return false;
	}
}

class Anggota {
	public function nama_ada($nama){
		global $koneksi;
		$nama= mysqli_real_escape_string($koneksi,$nama);

		$query = "SELECT * FROM anggota WHERE n_depan = '$nama'";
		$hasil = mysqli_query($koneksi, $query);

		if(mysqli_num_rows($hasil) == 0){
			return false;
		} else {
			return true;
		}
	}

	public function nim_ada($nim){
		global $koneksi;
		$nim = mysqli_real_escape_string($koneksi,$nim);

		$query = "SELECT * FROM anggota WHERE nim = '$nim'";
		$hasil = mysqli_query($koneksi, $query);

		if(mysqli_num_rows($hasil) == 0){
			return false;
		} else {
			return true;
		}
	}

	public function cek_status($nama,$nim){
		global $koneksi;
		$nama= mysqli_real_escape_string($koneksi,$nama);
		$nim = mysqli_real_escape_string($koneksi,$nim);
		$query = "SELECT * FROM anggota WHERE n_depan = '$nama' AND nim = '$nim'";
		$hasil = mysqli_query($koneksi,$query);
		$r = mysqli_fetch_assoc($hasil);

		if(mysqli_num_rows($hasil) == 1){
			if($r['status_anggota'] == 1){
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	private function proses($nama,$nim){ //proses login
		global $koneksi;
		$nama = strtolower(mysqli_real_escape_string($koneksi,$nama));
		$nim 	= mysqli_real_escape_string($koneksi,$nim);
		$query_nama = "SELECT * FROM anggota WHERE n_depan = '$nama' AND nim = '$nim'";
		$hasil = mysqli_query($koneksi,$query_nama);

		$s = mysqli_fetch_assoc($hasil);
		if($nama == strtolower($s['n_depan']) && $nim == $s['nim']){
			$_SESSION['login'] = true;
			$_SESSION['n_depan'] = $s['n_depan'];
			$_SESSION['n_belakang'] = $s['n_belakang'];
			$_SESSION['nama'] = $s['n_depan']." ".$s['n_belakang'];
			$_SESSION['id_anggota'] = $s['id_anggota'];
			header("Location: buku.php");
		} else {
			echo "<div class='alert alert-warning'>Gagal login.</div>";
		}
	}

	public function login($nm,$ni){
		return $this->proses($nm,$ni);
	}
}
/************
AKHIR Class Anggota
************/

function pinjam_login(){ //berguna di halaman buku.php
	if(isset($_SESSION['login'])){
		echo "buku.php";
	} else {
		echo "login.php";
	}
}

function pilihan($x){
	for($i=1; $i<=$x; $i++){
		echo "<option value='$i'>$i</option>";
	}
}
?>