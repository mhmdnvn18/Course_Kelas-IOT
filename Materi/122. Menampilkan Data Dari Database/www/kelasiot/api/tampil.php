<?php
//include+config/database.php
include "../config/database.php"; //memanggil file database.php 'http://kelasiot.test/api/data.php'

//variabel sql = select * from data
$sql = "SELECT * FROM data"; //membuat query untuk menampilkan data dari tabel data

//function+variabel+query sql = result
$result = mysqli_query($conn, $sql); //mengeksekusi query

//variabel+fetch+result = row
while ($row = mysqli_fetch_assoc($result)) { //mengambil data dari hasil eksekusi query
    echo $row['sensor_actuator'];
}

?>