<?php include "../koneksi.php"; ?>

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

        <form action="" method="POST">
            <div class="mb-3">
                <label>NIM</label>
                <input type="text" name="nim" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nama Mahasiswa</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Prodi</label>
                <input type="text" name="prodi" class="form-control" required>
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

            <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
            <a href="mahasiswa.php" class="btn btn-secondary">Kembali</a>
        </form>

        <?php
        if (isset($_POST['simpan'])) {
            // Ambil data dari form
            $nim      = $_POST['nim'];
            $nama     = $_POST['nama'];
            $prodi    = $_POST['prodi'];
            $angkatan = $_POST['angkatan'];
            $email    = $_POST['email'];

            $query = "INSERT INTO tbl_mahasiswa (nim, nama, prodi, angkatan, email) 
                      VALUES ('$nim', '$nama', '$prodi', '$angkatan', '$email')";
            $hasil = mysqli_query($koneksi, $query);

            if ($hasil) {
                header("Location: mahasiswa.php");
                exit;
            } else {
                echo "Gagal menyimpan: " . mysqli_error($koneksi);
            }
        }
        ?>

    </div>
</body>

</html>