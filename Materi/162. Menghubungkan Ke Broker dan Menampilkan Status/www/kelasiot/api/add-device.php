<?php
//include+config/database.php
include "../config/database.php"; //memanggil file database.php 'http://kelasiot.test/api/data.php'

//variabel sql = sql function + database table + data to be inserted + values + data to be inserted
$sql = "INSERT INTO devices (serial_number, mcu_type, location) VALUES ('87654321','Test','Jakarta')"; //membuat query sql untuk mengambil data dari database

//function+variabel+query sql = result
if(mysqli_query($conn, $sql)){
    //sql function for showing data + message
    echo "Data berhasil ditambahkan"; //jika data berhasil ditambahkan, maka akan muncul pesan "Data berhasil ditambahkan"
} else {
    //sql function for showing error + sql function for showing error message
    echo "data gagal ditambahkan";
    //echo "Error: ". mysqli_error($conn); //jika data gagal ditambahkan, maka akan muncul pesan "Error: " dan pesan error}
}
// untuk mengecek API http://kelasiot.test/api/add-device.php
?>