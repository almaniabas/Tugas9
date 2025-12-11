<?php
include "../koneksi.php";

$nidn  = $_POST['nidn'];
$nama  = $_POST['nama'];
$prodi = $_POST['prodi'];
$angkatan = $_POST['angkatan'];
$email = $_POST['email'];

$query = "
    INSERT INTO tbl_dosen (nidn, nama, prodi, angkatan, email)
    VALUES ('$nidn', '$nama', '$prodi', '$angkatan', '$email')
";

$hasil = mysqli_query($koneksi, $query);

if ($hasil) {
    header("Location: mahasiswa.php");
    exit;
} else {
    echo "Gagal update: " . mysqli_error($koneksi);
}
