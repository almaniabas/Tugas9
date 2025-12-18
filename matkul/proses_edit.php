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
    UPDATE tbl_matkul 
    SET 
        namaMatkul='$nama',
        sks='$sks',
        nidn='$nidn'
    WHERE kodeMatkul='$kode'
";

$hasil = mysqli_query($koneksi, $query);

if ($hasil) {
    header("Location: matkul.php?update=berhasil");
    exit;
} else {
    header("Location: matkul.php?update=gagal");
    exit;
}
