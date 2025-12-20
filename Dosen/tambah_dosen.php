<?php
include "../koneksi.php";
include "../blok.php";
if ($_SESSION['role'] == 'mhs') {
    header("Location: dosen.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-5">
        <h3 class="mb-4">➕ Tambah Dosen</h3>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class=" mb-3">
                <label>NIDN</label>
                <input type="text" name="nidn" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nama Dosen</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Prodi</label>
                <select name="prodi" class="form-select" required>
                    <option value="">-- Pilih Prodi --</option>
                    <option value="TRPL">TRPL</option>
                    <option value="TRM">TRM</option>
                    <option value="TRMK">TRMK</option>
                    <option value="TL">TL</option>
                </select>
            </div>


            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Foto</label>
                <input type="file" name="fileFoto" class="form-control" required>
            </div>

            <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
            <a href="dosen.php" class="btn btn-secondary">Kembali</a>
        </form>

        <?php
        if (isset($_POST['simpan'])) {

            $nidn  = $_POST['nidn'];
            $nama  = $_POST['nama'];
            $prodi = $_POST['prodi'];
            $email = $_POST['email'];

            $namaFile = $_FILES['fileFoto']['name'];
            $tmpFile  = $_FILES['fileFoto']['tmp_name'];

            $folder = "../folderFoto/";
            $path   = $folder . $namaFile;

            if (move_uploaded_file($tmpFile, $path)) {

                $query = "INSERT INTO tbl_dosen (nidn, foto, nama, prodi, email)
                  VALUES ('$nidn', '$namaFile', '$nama', '$prodi', '$email')";

                if (mysqli_query($koneksi, $query)) {
                    header("Location: dosen.php");
                    exit;
                } else {
                    echo "Gagal menyimpan: " . mysqli_error($koneksi);
                }
            } else {
                echo "Upload foto gagal!";
            }
        }
        ?>

    </div>
</body>

</html>