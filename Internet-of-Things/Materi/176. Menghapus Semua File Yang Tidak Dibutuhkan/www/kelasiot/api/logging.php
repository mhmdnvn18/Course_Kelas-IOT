<?php
//fungsi untuk mengambil data dari webhook
include "../config/database.php"; // include database.php untuk mengambil data dari database
//fungsi untuk mengambil data dari webhook
$webhookResponse = json_decode(file_get_contents('php://input'), true); // variable + fungsi json_decode untuk mengambil data dari webhook + fungsi file_get_contents untuk mengambil data dari webhook
$topic = $webhookResponse["topic"]; // variable $topic untuk menyimpan data dari webhook
$payload = $webhookResponse["payload"]; // variable $payload untuk menyimpan data dari webhook
//variabel + fungsi explode + = + (fungsi untuk memecah data dari webhook)
$topicExplode = explode("/", $topic); // variable $topic untuk memecah data dari webhook

$serialNumber = $topicExplode[2]; // variable $serialNumber untuk menyimpan data dari webhook
$name = $topicExplode[3]; // variable $name untuk menyimpan data dari webhook

if($topicExplode[3] == "SUHU" || $topicExplode[3] == "KELEMBAPAN" || $topicExplode[3] == "POTENSIOMETER") { // jika data dari webhook sama dengan suhu, kelembapan, co2, sensor
    $type = "sensor";
} else {
    $type = "actuator";
}

$sql = "INSERT INTO data (serial_number, sensor_actuator, value, name, mqtt_topic)
    VALUES ('$serialNumber', '$type', '$payload', '$name', '$topic')"; // variable $sql untuk menyimpan data dari database
mysqli_query($conn, $sql); // fungsi mysqli_query untuk mengambil data dari database

?>