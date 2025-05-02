<?php
session_start();                 //fungsi untuk memulai session
include "config/database.php";  //memanggil file database.php

$message = "Masukan Username dan Password";   //variabel message  

//percabangan jika form login di-submit
if(isset($_POST['username'])){
  $username = $_POST['username']; //variabel username = inputan username
  $password = $_POST['password']; //variabel password = inputan password

  //variabel sql = query untuk mengecek username di database
  $sql = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
  $result = mysqli_query($conn, $sql);  //variabel result = eksekusi query sql

  $data = mysqli_fetch_assoc($result);  //variabel data = data hasil query result

  //percabangan + fungsi sql + fungsi password verify
  if(!mysqli_num_rows($result) > 0){
    $message = "<b style='color:red;'>Username tidak terdaftar</b>";  //pesan error jika username tidak terdaftar di database
  } else {
    if(password_verify($password, $data['password'])){
      //variabel session + data user = data user yang login
      $_SESSION['username'] = $username;          //variabel session username = username yang login
      $_SESSION['fullname'] = $data['fullname'];  //variabel session fullname = fullname yang login
      $_SESSION['role'] = $data['role'];          //variabel session role = role yang login
      // fungsi tampil sql + javascript untuk pindah halaman
      echo "<script> location.href='index.php' </script>";  //pindah halaman ke index.php
    } else {
      $message = "<b style='color:red'>Password Salah</b>"; //pesan error jika password salah
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem IoT - Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Sistem</b> IoT
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><?php echo $message ?></p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src=".plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
