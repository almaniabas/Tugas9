<?php
$koneksi = mysqli_connect("localhost", "root", "", "kampus");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
