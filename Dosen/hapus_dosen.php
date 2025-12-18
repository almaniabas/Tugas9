<?php
include "../koneksi.php";
include "../blok.php";
if ($_SESSION['role'] == 'mhs') {
    header("Location: dosen.php");
    exit;
}

if (isset($_GET['nidn'])) {
    $nidn = $_GET['nidn'];

    $hapus = mysqli_query($koneksi, "DELETE FROM tbl_dosen WHERE nidn='$nidn'");

    if ($hapus) {
        header("Location: dosen.php?status=berhasil");
        exit;
    } else {
        header("Location: dosen.php?status=gagal");
        exit;
    }
}
