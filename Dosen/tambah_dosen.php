<?php include "../koneksi.php"; ?>

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

        <form action="" method="POST">
            <div class="mb-3">
                <label>NIDN</label>
                <input type="text" name="nidn" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nama Dosen</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Prodi</label>
                <input type="text" name="prodi" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
            <a href="dosen.php" class="btn btn-secondary">Kembali</a>
        </form>

        <?php
        if (isset($_POST['simpan'])) {
            $nidn = $_POST['nidn'];
            $nama = $_POST['nama'];
            $prodi = $_POST['prodi'];
            $email = $_POST['email'];

            $query = "INSERT INTO tbl_dosen (nidn, nama, prodi, email) VALUES ('$nidn', '$nama', '$prodi', '$email')";
            $hasil = mysqli_query($koneksi, $query);

            if ($hasil) {
                header("Location: dosen.php");
                exit;
            } else {
                echo "Gagal menyimpan: " . mysqli_error($koneksi);
            }
        }
        ?>

    </div>
</body>

</html>