<?php
session_start();
if(isset($_SESSION['login-adm'])){
	header("Location: index.php");
} else {
	require_once "function/db.php";
	require_once "function/fungsi.php";
	//require_once yang seharusnya memanggil core/init.php tetapi diganti
	//dengan 2 file diatas agar SESSION tidak konflik
	//karena pada core/init.php menuju ke halaman admin/login.php
?>
<!DOCTYPE html>
<html>
<head>
	<title>Administrator</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
	<style type="text/css">
		body, html {
			height: 100%;
		}
		body {
			background-color: #0090bd;
		}
		#formulir {
			max-width: 350px;
			margin: 5% auto 25px;
			background-color: #FAFAFA;
			padding: 40px;
			border-radius: 10px 10px 2px 2px;
		}
		.img {
			margin: 5px auto 20px;
		}
		img {
			max-width: 150px;
			max-height: 150px;
		}
		.form-control,
		label {
			margin-bottom: 10px;
			width: 100%;
		}
		.warning {
			margin-top: 10px;
			padding: 10px;
			color: #FF2800;
		}
	</style>

	<script type="text/javascript" src="../bootstrap/jquery.min.js"></script>
</head>
<body>

<div class="container">
	<div id="formulir">
		<div class="img text-center">
			<img src="https://cdn3.iconfinder.com/data/icons/glypho-computers-andother-tech/64/user-spy-thief-glasses-hat-512.png" class="img-circle"/>
		</div>
		<form action="login.php" method="POST">
			<input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
			<input type="password" class="form-control" placeholder="Password" name="pass" required>
			<input type="submit" class="btn btn-lg btn-primary btn-block" name="login-adm" value="LOGIN">
		</form>
		<div class="warning">
			<?php
			if(isset($_POST['login-adm'])){
				$username = $_POST['username'];
				$pass 		= $_POST['pass'];

				if(!empty($_POST)){
					if($_POST['username']){
						if($_POST['pass']){
							if(admin_ada($username)){
								login_admin($username,$pass);
							} else echo "Username $username tidak terdaftar.";
						} else echo "Password tidak boleh kosong.";
					} else echo "Username tidak boleh kosong.";
				} else echo "Harap isi semua data.";
			}
			?>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	$("#formulir").hide().fadeIn(2000);
});
</script>

</body>
</html>
<?php
} // akhir dari if(isset($_SESSION['login-adm']))
?>