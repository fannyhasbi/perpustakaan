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
			$query	= "SELECT * FROM anggota ORDER BY n_depan ASC";
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
</div>

<footer class="container-fluid text-center">
	<p>Copyright &copy; 2016 <a href="https://github.com/fannyhasbi/">Fanny Hasbi</a></p>
</footer>
</body>
</html>