<?php
session_start(); //Memulai session

session_destroy(); //Menghapus semua session
echo "<script> location.href='login.php' </script>"; //Jika belum ada, maka akan di-redirect ke halaman login.php
?>