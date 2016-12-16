<?php
$koneksi = mysqli_connect("localhost","root","","perpustakaan") or die(mysql_error());

if(isset($_GET['jenis'])){
  $jenis = $_GET['jenis'];

  if($jenis){
	  if($jenis == "all"){
	  	$query = "SELECT * FROM buku ORDER BY judul ASC";
	  } else {
	    $query = "SELECT * FROM buku WHERE jenis_buku = '$jenis' ORDER BY judul ASC";
	  }
    $hasil = mysqli_query($koneksi, $query);
    if($hasil){
      if(mysqli_num_rows($hasil) > 0){
        $no = 1;
        while($r = mysqli_fetch_assoc($hasil)){
          $file = "buku/". $r['alamat'];
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
      } else echo "Tidak ditemukan";
    } else echo "Query error";
  } else echo "Jenis tidak boleh kosong";
} else echo "Tidak ada Get";


?>