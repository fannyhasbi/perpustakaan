<!DOCTYPE html>
<html>
<head>
	<title>Login Administrator</title>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="<?php echo site_url('admin');?>">
		<table>
			<tr>
				<td><label for="username">Username</label></td>
				<td><input type="text" name="username" required></td>
			</tr>
			<tr>
				<td><label for="password">Password</label></td>
				<td><input type="password" name="password" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login_admin" value="Login"></td>
			</tr>
		</table>
	</form>

</body>
</html>