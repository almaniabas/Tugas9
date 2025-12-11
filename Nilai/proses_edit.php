<?php
include "../koneksi.php";

$id_nilai    = $_POST['id_nilai'];
$nim         = $_POST['nim'];
$kodeMatkul  = $_POST['kodeMatkul'];
$nidn        = $_POST['nidn'];
$nilai       = $_POST['nilai'];
$nilaiHuruf  = $_POST['nilaiHuruf'];

$query = "
    UPDATE tbl_nilai 
    SET 
        nim='$nim',
        kodeMatkul='$kodeMatkul',
        nidn='$nidn',
        nilai='$nilai',
        nilaiHuruf='$nilaiHuruf'
    WHERE id_nilai='$id_nilai'
";

$hasil = mysqli_query($koneksi, $query);

if ($hasil) {
    header("Location: nilai.php?update=berhasil");
    exit;
} else {
    header("Location: nilai.php?update=gagal");
    exit;
}
