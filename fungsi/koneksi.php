<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "pjlp";
// Create connection
$koneksi = mysqli_connect($host, $username, $password, $database);
// Check connection
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
//mysqli_close($koneksi);
?>