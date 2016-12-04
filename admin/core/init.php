<?php
if(isset($_SESSION['login-adm'])){
	require_once "function/db.php";
	require_once "function/fungsi.php";
} else {
	header("Location: login.php");
}
?>