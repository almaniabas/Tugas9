<?php
include "../koneksi.php";

$nim        = $_POST['nim'];
$kodeMatkul = $_POST['kodeMatkul'];
$nidn       = $_POST['nidn'];
$nilai      = $_POST['nilai'];
$nilaiHuruf = $_POST['nilaiHuruf'];

$query = "
    INSERT INTO tbl_nilai (nim, kodeMatkul, nidn, nilai, nilaiHuruf)
    VALUES ('$nim', '$kodeMatkul', '$nidn', '$nilai', '$nilaiHuruf')
";

$hasil = mysqli_query($koneksi, $query);

if ($hasil) {
    header("Location: nilai.php?simpan=berhasil");
    exit;
} else {
    echo "Gagal simpan: " . mysqli_error($koneksi);
}
