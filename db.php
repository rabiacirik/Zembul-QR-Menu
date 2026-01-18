<?php
$host = "localhost";
$user = "root";
$pass = "root"; // MAMP varsayılan şifresi 'root'tur
$dbname = "zembul_menu";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}
$conn->set_charset("utf8");
?>