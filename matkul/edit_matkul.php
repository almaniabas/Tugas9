<?php
include "../koneksi.php";

$kode = $_GET['kodeMatkul'];

$data = mysqli_query($koneksi, "SELECT * FROM tbl_matkul WHERE kodeMatkul='$kode'");
$row = mysqli_fetch_assoc($data);

$dosen = mysqli_query($koneksi, "SELECT nidn, nama FROM tbl_dosen ORDER BY nama ASC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-5">
        <h3 class="mb-4">✏️ Edit Data Mata Kuliah</h3>

        <form action="edit_matkul.php?kodeMatkul=<?= $kode ?>" method="POST">

            <div class="mb-3">
                <label>Kode Mata Kuliah (Tidak bisa diubah)</label>
                <input type="text" class="form-control" value="<?= $row['kodeMatkul'] ?>" disabled>
            </div>

            <div class="mb-3">
                <label>Nama Mata Kuliah</label>
                <input type="text" name="namaMatkul" class="form-control"
                    value="<?= $row['namaMatkul'] ?>" required>
            </div>

            <div class="mb-3">
                <label>SKS</label>
                <input type="number" name="sks" class="form-control"
                    value="<?= $row['sks'] ?>" required min="1" max="6">
            </div>

            <div class="mb-3">
                <label>Dosen Pengampu</label>
                <select name="nidn" class="form-select" required>
                    <option value="">-- Pilih Dosen --</option>

                    <?php while ($d = mysqli_fetch_assoc($dosen)) { ?>
                        <option value="<?= $d['nidn'] ?>"
                            <?= ($d['nidn'] == $row['nidn']) ? 'selected' : '' ?>>
                            <?= $d['nama'] ?> (<?= $d['nidn'] ?>)
                        </option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="matkul.php" class="btn btn-secondary">Kembali</a>
        </form>

        <?php
        if (isset($_POST['update'])) {

            $namaMatkul = $_POST['namaMatkul'];
            $sks        = $_POST['sks'];
            $nidn       = $_POST['nidn'];

            $query = "UPDATE tbl_matkul 
                  SET namaMatkul='$namaMatkul', sks='$sks', nidn='$nidn' 
                  WHERE kodeMatkul='$kode'";

            $hasil = mysqli_query($koneksi, $query);

            if ($hasil) {
                header("Location: matkul.php?update=berhasil");
                exit;
            } else {
                echo "<div class='alert alert-danger mt-3'>Gagal update data!</div>";
            }
        }
        ?>
    </div>

</body>

</html>