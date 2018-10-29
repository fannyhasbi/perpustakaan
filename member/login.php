<?php
session_start();

// jika sudah login
if(isset($_SESSION['login_member']))
  header('Location: ../buku/index.php');

// jika klik tombol login
if(isset($_POST['login-member']) && isset($_POST['username']) && isset($_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  require_once __DIR__."/../core/autoload.php";
  
  $query = "SELECT * FROM anggota WHERE username = '". $username ."'";
  $result= mysqli_query($connect, $query);

  // Cek apakah username terdaftar
  if($result->num_rows == 0)
    die("Username atau password salah");

  $row = mysqli_fetch_assoc($result);

  // cek apakah password input sama dengan password di database
  // karena menggunakan enkripsi, maka perlu menggunakan fungsi password_verify
  // untuk memvalidasi
  if(!password_verify($password, $row['password']))
    die("Username atau password salah");

  $_SESSION['login_member'] = true;
  $_SESSION['id_anggota']   = $row['id'];
  $_SESSION['username']     = $row['username'];
  $_SESSION['nama']         = $row['nama'];
  $_SESSION['status']       = $row['status'];
  $_SESSION['alamat']       = $row['alamat'];

  header("Location: ../buku/index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Member</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <h1>Login Member</h1>

  <form action="" method="post">
    <div>
      <label for="username">Username</label><br />
      <input type="text" name="username" placeholder="username" autofocus />

      <br><br>

      <label for="password">Password</label><br>
      <input type="password" name="password" placeholder="password">

      <br><br>

      <input type="submit" name="login-member" value="Masuk">
    </div>
  </form>
</body>
</html>