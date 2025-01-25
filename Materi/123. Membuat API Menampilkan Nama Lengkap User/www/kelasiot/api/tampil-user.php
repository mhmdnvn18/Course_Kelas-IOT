<?php
//include+config/database.php
include "../config/database.php"; //memanggil file database.php 'http://kelasiot.test/api/data.php'

$username = $_GET['username']; //membuat variabel username yang berisi data dari username yang diambil dari database

//variabel sql = "SELECT * fullname FROM user WHERE username = '$username'"
$sql = "SELECT fullname FROM user WHERE username = '$username'"; //membuat query sql untuk mengambil data dari database 
//function+variabel+query sql = result
$result = mysqli_query($conn, $sql); //mengeksekusi query

if(mysqli_num_rows($result) > 0) { //jika jumlah baris dari hasil eksekusi query lebih dari 0
    //variabel+fetch+result = row
    while ($row = mysqli_fetch_assoc($result)) { //mengambil data hasil eksekusi query
        echo $row['fullname']; //menampilkan data fullname
    }
} else {
    echo "Data tidak ada"; //jika data tidak ada, maka akan muncul pesan "Data tidak ada"
} 


?>