<?php
include "../koneksi.php";
include "../blok.php";
if ($_SESSION['role'] == 'mhs') {
    header("Location: mahasiswa.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-5">
        <h3 class="mb-4">➕ Tambah Mahasiswa</h3>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nama Mahasiswa</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div>
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
                <label>Angkatan</label>
                <select name="angkatan" class="form-select" required>
                    <option value="">-- Pilih Angkatan --</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
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
            <a href="mahasiswa.php" class="btn btn-secondary">Kembali</a>
        </form>

        <?php
        if (isset($_POST['simpan'])) {

            $nim  = $_POST['nim'];
            $nama  = $_POST['nama'];
            $prodi = $_POST['prodi'];
            $email = $_POST['email'];

            $namaFile = $_FILES['fileFoto']['name'];
            $tmpFile  = $_FILES['fileFoto']['tmp_name'];

            $folder = "../folderFoto/";
            $path   = $folder . $namaFile;

            if (move_uploaded_file($tmpFile, $path)) {

                $query = "INSERT INTO tbl_mahasiswa (nim, foto, nama, prodi, email)
                  VALUES ('$nim', '$namaFile', '$nama', '$prodi', '$email')";

                if (mysqli_query($koneksi, $query)) {
                    header("Location: mahasiswa.php");
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