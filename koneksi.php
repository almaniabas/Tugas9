<?php
$host     = "localhost";
$user     = "root";
$password = "";
$database = "kampus";

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $password, $database);

// Mengecek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
