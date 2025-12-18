<?php
include "../koneksi.php";
include "../blok.php";
if ($_SESSION['role'] == 'mhs') {
    header("Location: matkul.php");
    exit;
}

$kode  = $_POST['kodeMatkul'];
$nama  = $_POST['namaMatkul'];
$sks   = $_POST['sks'];
$nidn  = $_POST['nidn'];

$query = "
    INSERT INTO tbl_matkul (kodeMatkul, namaMatkul, sks, nidn)
    VALUES ('$kode', '$nama', '$sks', '$nidn')
";

$hasil = mysqli_query($koneksi, $query);

if ($hasil) {
    header("Location: matkul.php?simpan=berhasil");
    exit;
} else {
    echo "Gagal simpan: " . mysqli_error($koneksi);
}
