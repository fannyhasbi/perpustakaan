<?php
// Kredensial database yang diperlukan

$host     = "localhost";
$uname    = "root";
$pass     = "";
$database = "perpustakaan";

$connect = mysqli_connect($host, $uname, $pass, $database) OR die(mysql_error());
