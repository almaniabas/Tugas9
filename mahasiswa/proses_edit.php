<?php
include "../koneksi.php";

$nim  = $_POST['nim'];
$nama  = $_POST['nama'];
$angkatan = $_POST['angkatan'];
$email = $_POST['email'];

$query = "
    UPDATE tbl_mahasiswa 
    SET 
        nama='$nama',
        prodi='$prodi',
        angkatan='$angkatan',
        email='$email'
    WHERE nim='$nim'
";

$hasil = mysqli_query($koneksi, $query);

if ($hasil) {
    header("Location: dosen.php");
    exit;
} else {
    echo "Gagal update: " . mysqli_error($koneksi);
}
