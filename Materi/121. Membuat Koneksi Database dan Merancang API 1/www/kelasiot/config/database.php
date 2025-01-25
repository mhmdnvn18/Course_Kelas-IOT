<?php
$servername = "localhost";      //nama server
$username = "root";             //nama user
$password = "";                 //password user (kosongkan jika tidak ada)
$databasename = "kelasiot";     //nama database

$conn = mysqli_connect($servername, $username, $password, $databasename);       //membuat koneksi


//Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());       //jika koneksi gagal, maka akan muncul pesan "Koneksi gagal"
}
echo "Koneksi berhasil";    //jika koneksi berhasil, maka akan muncul pesan "Koneksi berhasil"
?>