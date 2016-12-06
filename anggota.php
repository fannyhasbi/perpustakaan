<?php
session_start();
require_once "core/init.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Anggota</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="view/main.css"/>

	<script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<?php include "view/nav.php";?>

<div class="container-fluid">
	<div class="text-center margin-md">
		<h3>Daftar Anggota</h3>
	</div>

	<?php
	$mulai = 0;
	$batas = 10;
	
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$mulai = ($id-1) * $batas;
	}
	else{
		$id = 1;
	}
	//Fetch from database first 10 items which is its limit. For that when page open you can see first 10 items. 
	$query = "SELECT * FROM anggota LIMIT $mulai, $batas";
	$hasil = mysqli_query($koneksi,$query);
	?>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>ID anggota</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>NIM</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$query	= "SELECT * FROM anggota ORDER BY n_depan ASC LIMIT $mulai, $batas";
			$hasil	= mysqli_query($koneksi, $query);
			$no = 1;

			while($row = mysqli_fetch_assoc($hasil)){
				echo "<tr>";
				echo "<td>" . $no . "</td>";
				echo "<td>" . $row['id_anggota'] . "</td>";
				echo "<td>" . $row['n_depan'] . " " . $row['n_belakang'] . "</td>";
				echo "<td>" . $row['alamat'] . "</td>";
				echo "<td>" . $row['nim'] . "</td>";
				echo "<td>";
				if($row['status_anggota'] == 1){
					echo "Aktif";
				} else {
					echo "Tidak aktif";
				}
				echo "</td>";
				echo "</tr>";
				$no++;
			}
			?>
		</tbody>
	</table>
	
	<?php
	$row = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM anggota")); // jumlah baris data di database
	$total = ceil($row/$batas); //total halaman
	?>

	<ul class="pager">
	<?php
	if($id > 1){
		echo "<li><a href='?id=" . ($id-1) ."'><<</a></li>";
	}

  for($i=1; $i<=$total; $i++){
  	if($i == $id) echo "<li class='active'><a href='#'>".$i."</a></li>";
  	else echo "<li><a href='?id=".$i."'>".$i."</a></li>";
  }

	if($id != $total){
    ////Go to previous page to show next 10 items.
    echo "<li><a href='?id=".($id+1)."'>>></a></li>";
	}
	?>
	</ul>

</div>

<footer class="container-fluid text-center">
	<p>Copyright &copy; 2016 <a href="https://github.com/fannyhasbi/">Fanny Hasbi</a></p>
</footer>
</body>
</html>