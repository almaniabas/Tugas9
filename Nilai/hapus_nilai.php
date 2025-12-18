<?php
include "../koneksi.php";
include "../blok.php";
if ($_SESSION['role'] == 'mhs') {
    header("Location: nilai.php");
    exit;
}

if (isset($_GET['id_nilai'])) {
    $id_nilai = $_GET['id_nilai'];

    $hapus = mysqli_query($koneksi, "DELETE FROM tbl_nilai WHERE id_nilai='$id_nilai'");

    if ($hapus) {
        header("Location: nilai.php?status=berhasil");
        exit;
    } else {
        header("Location: nilai.php?status=gagal");
        exit;
    }
}
