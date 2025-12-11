<?php
include "../koneksi.php";

if (isset($_GET['kodeMatkul'])) {
    $kode = $_GET['kodeMatkul'];

    $hapus = mysqli_query($koneksi, "DELETE FROM tbl_matkul WHERE kodeMatkul='$kode'");

    if ($hapus) {
        header("Location: matkul.php?status=berhasil");
        exit;
    } else {
        header("Location: matkul.php?status=gagal");
        exit;
    }
}
