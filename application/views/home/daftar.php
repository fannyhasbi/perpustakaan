<!DOCTYPE html>
<html>
<head>
	<title>Daftar</title>
	<meta charset="utf-8">
</head>
<body>
	<?php echo validation_errors(); ?>
	<?php echo form_open(site_url('daftar')); ?>

		<table>
			<tr>
				<td><label for="nama">Nama Lengkap</label></td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td><label for="username">Username</label></td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td><label for="password">Password</label></td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="daftar" value="Daftar"></td>
			</tr>
		</table>

	<?php echo form_close(); ?>

</body>
</html>