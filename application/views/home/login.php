<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
</head>
<body>
	<?php echo validation_errors(); ?>
	<?php echo form_open('login'); ?>

		<table>
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
				<td><input type="submit" name="login" value="Login"></td>
			</tr>
		</table>

	<?php echo form_close(); ?>
	<a href="<?php echo site_url('daftar');?>">Daftar disini</a>

</body>
</html>