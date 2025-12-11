<?php
include "../koneksi.php";

$nidn = $_GET['nidn'];

$data = mysqli_query($koneksi, "SELECT * FROM tbl_dosen WHERE nidn='$nidn'");
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
        <h3 class="mb-4">✏️ Edit Data Dosen</h3>

        <form action="" method="POST">
            <div class="mb-3">
                <label>NIDN (Tidak bisa diubah)</label>
                <input type="text" class="form-control" value="<?= $row['nidn'] ?>" disabled>
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
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= $row['email'] ?>" required>
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="dosen.php" class="btn btn-secondary">Kembali</a>
        </form>

        <?php
        if (isset($_POST['update'])) {
            $nama  = $_POST['nama'];
            $prodi = $_POST['prodi'];
            $email = $_POST['email'];

            $query = "UPDATE tbl_dosen SET nama='$nama', prodi='$prodi', email='$email' WHERE nidn='$nidn'";
            $hasil = mysqli_query($koneksi, $query);

            if ($hasil) {
                header("Location: dosen.php?update=berhasil");
                exit;
            } else {
                echo "<div class='alert alert-danger mt-3'>Gagal update data!</div>";
            }
        }
        ?>

    </div>
</body>

</html>