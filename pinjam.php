<!DOCTYPE html>
<html>
<head>
	<title>Pinjam Buku</title>
	<link rel="stylesheet" href="view/main.css"/>
</head>
<body>
<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="anggota.php">Anggota</a></li>
	<li><a href="buku.php">Buku</a></li>
	<li><a href="pinjam.php">Pinjam</a></li>
</ul>

<h4>Buku yang belum dikembalikan</h4>
<table border="1">
	<thead>
		<tr>
			<th>Tanggal pinjam</th>
			<th>Jumlah Pinjam</th>
			<th>Nama peminjam</th>
			<th>Buku</th>
		</tr>
	</thead>
	<tbody>
		<?php
		require_once "core/init.php";
		$query = "SELECT * FROM meminjam,buku,anggota WHERE meminjam.id_anggota = anggota.id_anggota AND meminjam.id_buku = buku.id_buku AND meminjam.kembali = 0";
		$hasil = mysqli_query($koneksi, $query);

		while($r = mysqli_fetch_assoc($hasil)){
		?>
		<tr>
			<td><?php echo $r['tgl_pinjam']; ?></td>
			<td><?php echo $r['jumlah_pinjam']; ?></td>
			<td><?php echo $r['nama']; ?></td>
			<td><?php echo $r['judul']; ?></td>
			<td><a href="kembali.php?id=<?php echo $r['id_pinjam']; ?>">Kembalikan</a></td>
		</tr>

		<?php
		} //akhir while buku yang belum kembali
		?>
	</tbody>
</table>
<br><br>
<h4>Buku yang sudah dikembalikan</h4>
<table border="1">
	<thead>
		<tr>
			<th>Tanggal pinjam</th>
			<th>Tanggal kembali</th>
			<th>Jumlah pinjam</th>
			<th>Nama peminjam</th>
			<th>Buku</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$query = "SELECT * FROM meminjam,anggota,buku WHERE meminjam.id_anggota = anggota.id_anggota AND meminjam.id_buku = buku.id_buku AND kembali = 1 ORDER BY meminjam.tgl_kembali DESC";
		$hasil = mysqli_query($koneksi,$query);
		while($s = mysqli_fetch_assoc($hasil)){
		?>
		<tr>
			<td><?php echo $s['tgl_pinjam']; ?></td>
			<td><?php echo $s['tgl_kembali']; ?></td>
			<td><?php echo $s['jumlah_pinjam']; ?></td>
			<td><?php echo $s['nama']; ?></td>
			<td><?php echo $s['judul']; ?></td>
		</tr>
		<?php
		} // akhir while buku yg sudah kembali
		?>
	</tbody>
</table>

<p>Copyright Fanny Hasbi</p>
</body>
</html>