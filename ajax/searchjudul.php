<?php
$koneksi = mysqli_connect("localhost","root","","perpustakaan") or die(mysql_error());
//echo str_ireplace($term, "<b>".$term."</b>", $row['judul']);

if(isset($_GET['judul'])){
	$judul = $_GET['judul'];

	if($judul){
		$query = "SELECT * FROM buku WHERE judul LIKE '%$judul%'";
		$hasil = mysqli_query($koneksi,$query);
		if($hasil){
			if(mysqli_num_rows($hasil) > 0){
				$no = 1;
				while($r = mysqli_fetch_assoc($hasil)){
					$file = "buku/" . $r['alamat'];
					if($r['jumlah'] < 1){echo "<tr class='danger'>";}else echo "<tr>";
					echo "<td>". $no ."</td>";
          echo "<td>". $r['id_buku'] ."</td>";
          echo "<td><a href='" . $file . "'>" . $r['judul'] . "</a></td>";
					echo "<td>". $r['pengarang'] . "</td>";
					echo "<td>". $r['jenis_buku'] ."</td>";
					echo "<td>". $r['penerbit'] ."</td>";
					echo "</tr>";
          $no++;
				}
			} else echo "Pencarian Anda, <b>". $judul ."</b> tidak terkait dengan data apapun.";
		} else echo "Terjadi kesalahan query";
	} else echo "Pencarian tidak ada";
}
?>