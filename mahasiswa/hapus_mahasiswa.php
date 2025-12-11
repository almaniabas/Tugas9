<?php
include "../koneksi.php";

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    $hapus = mysqli_query($koneksi, "DELETE FROM tbl_mahasiswa WHERE nim='$nim'");

    if ($hapus) {
        header("Location: mahasiswa.php?status=berhasil");
        exit;
    } else {
        header("Location: mahasiswa.php?status=gagal");
        exit;
    }
}
