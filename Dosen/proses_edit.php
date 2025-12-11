<?php
include "../koneksi.php";

$nidn  = $_POST['nidn'];
$nama  = $_POST['nama'];
$prodi = $_POST['prodi'];
$email = $_POST['email'];

$query = "
    UPDATE tbl_dosen 
    SET 
        nama='$nama',
        prodi='$prodi',
        email='$email'
    WHERE nidn='$nidn'
";

$hasil = mysqli_query($koneksi, $query);

if ($hasil) {
    header("Location: dosen.php");
    exit;
} else {
    echo "Gagal update: " . mysqli_error($koneksi);
}
