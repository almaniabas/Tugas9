<?php
include "../koneksi.php";
include "../blok.php";
if ($_SESSION['role'] == 'mhs') {
    header("Location: dosen.php");
    exit;
}

$nidn  = $_POST['nidn'];
$nama  = $_POST['nama'];
$prodi = $_POST['prodi'];
$email = $_POST['email'];

$query = "
    INSERT INTO tbl_dosen (nidn, nama, prodi, email)
    VALUES ('$nidn', '$nama', '$prodi', '$email')
";

$hasil = mysqli_query($koneksi, $query);

if ($hasil) {
    header("Location: dosen.php");
    exit;
} else {
    echo "Gagal update: " . mysqli_error($koneksi);
}
