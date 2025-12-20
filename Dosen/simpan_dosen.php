<?php
include "../koneksi.php";
include "../blok.php";

if ($_SESSION['role'] == 'mhs') {
    header("Location: dosen.php");
    exit;
}

if (isset($_POST['simpan'])) {

    $nidn  = $_POST['nidn'];
    $nama  = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];

    $namaFile = $_FILES['fileFoto']['name'];
    $tmpFile  = $_FILES['fileFoto']['tmp_name'];

    $folder = "../folderfoto/";
    $path   = $folder . $namaFile;

    if (move_uploaded_file($tmpFile, $path)) {

        $query = "INSERT INTO tbl_dosen (nidn, nama, prodi, email, foto)
                  VALUES ('$nidn', '$nama', '$prodi', '$email', '$namaFile')";

        mysqli_query($koneksi, $query);
        header("Location: dosen.php");
        exit;
    } else {
        echo "File gagal di upload!";
        echo "<br><a href='tambah_dosen.php'>Kembali</a>";
    }
}
