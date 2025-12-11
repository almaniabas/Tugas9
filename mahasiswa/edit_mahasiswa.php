<?php
include "../koneksi.php";

$nim = $_GET['nim'];

$data = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE nim='$nim'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-5">
        <h3 class="mb-4">✏️ Edit Data Mahasiswa</h3>

        <form action="" method="POST">
            <div class="mb-3">
                <label>NIM (Tidak bisa diubah)</label>
                <input type="text" class="form-control" value="<?= $row['nim'] ?>" disabled>
            </div>

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= $row['nama'] ?>" required>
            </div>

            <div class="mb-3">
                <label>Prodi</label>
                <select name="prodi" class="form-select" required>
                    <option value="">-- Pilih Prodi --</option>
                    <option value="TRPL" <?= ($row['prodi'] == 'TRPL') ? 'selected' : '' ?>>TRPL</option>
                    <option value="TRM" <?= ($row['prodi'] == 'TRM') ? 'selected' : '' ?>>TRM</option>
                    <option value="TRMK" <?= ($row['prodi'] == 'TRMK') ? 'selected' : '' ?>>TRMK</option>
                    <option value="TL" <?= ($row['prodi'] == 'TL') ? 'selected' : '' ?>>TL</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Angkatan</label>
                <select name="angkatan" class="form-select" required>
                    <option value="">-- Pilih Angkatan --</option>
                    <option value="2018" <?= ($row['angkatan'] == '2018') ? 'selected' : '' ?>>2018</option>
                    <option value="2019" <?= ($row['angkatan'] == '2019') ? 'selected' : '' ?>>2019</option>
                    <option value="2020" <?= ($row['angkatan'] == '2020') ? 'selected' : '' ?>>2020</option>
                    <option value="2021" <?= ($row['angkatan'] == '2021') ? 'selected' : '' ?>>2021</option>
                    <option value="2022" <?= ($row['angkatan'] == '2022') ? 'selected' : '' ?>>2022</option>
                    <option value="2023" <?= ($row['angkatan'] == '2023') ? 'selected' : '' ?>>2023</option>
                    <option value="2024" <?= ($row['angkatan'] == '2024') ? 'selected' : '' ?>>2024</option>
                    <option value="2025" <?= ($row['angkatan'] == '2025') ? 'selected' : '' ?>>2025</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= $row['email'] ?>" required>
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="mahasiswa.php" class="btn btn-secondary">Kembali</a>
        </form>

        <?php
        if (isset($_POST['update'])) {
            $nama  = $_POST['nama'];
            $prodi = $_POST['prodi'];
            $angkatan = $_POST['angkatan'];
            $email = $_POST['email'];

            $query = "UPDATE tbl_mahasiswa SET nama='$nama', prodi='$prodi', angkatan='$angkatan', email='$email' WHERE nim='$nim'";
            $hasil = mysqli_query($koneksi, $query);

            if ($hasil) {
                header("Location: mahasiswa.php?update=berhasil");
                exit;
            } else {
                echo "<div class='alert alert-danger mt-3'>Gagal update data!</div>";
            }
        }
        ?>

    </div>
</body>

</html>