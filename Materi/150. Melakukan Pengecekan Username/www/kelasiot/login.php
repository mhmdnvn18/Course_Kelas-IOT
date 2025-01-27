<?php

include "config/database.php"; // include file database.php untuk menghubungkan file login.php dengan database
// variable message + string "Masukan Username dan Password"
$message = "Masukan Username dan Password";
// conditional statement + isset() untuk mengecek apakah form sudah di submit atau belum + $_POST['username'] untuk mengecek apakah inputan username sudah di isi atau belum
if(isset($_POST['username'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  // variabel $sql + query untuk mengecek apakah username yang di inputkan sudah ada di database atau belum
  $sql = "SELECT * FROM user WHERE username = '$username' "; // query untuk mengecek apakah username yang di inputkan sudah ada di database atau belum
  $result = mysqli_query($conn, $sql); // eksekusi query

  if(!mysqli_num_rows($result) > 0){
    //variabel $message + string + Style untuk memberikan warna pada text
    $message = "<b style='color:red;'> Username tidak terdaftar </b>"; // jika username tidak terdaftar
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kelas IoT - Login</title>

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
    <b>Kelas</b> IoT
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><?php echo $message ?></p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <!-- html tag input dengan type text dan class form-control + name username + placeholder Username + required -->
          <input type="text" class="form-control" name="username" placeholder="Username" required>  <!-- fungsi required untuk menandakan bahwa inputan tidak boleh kosong -->
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-users"></span>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
