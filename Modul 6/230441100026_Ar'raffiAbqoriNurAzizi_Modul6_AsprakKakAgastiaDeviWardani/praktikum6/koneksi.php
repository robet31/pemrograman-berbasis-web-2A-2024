<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$database = "data_mhs";

$koneksi = mysqli_connect($servername, $username, $password, $database);

if (mysqli_connect_error()) {
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>