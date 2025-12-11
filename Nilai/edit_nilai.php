<?php
include "../koneksi.php";

$id_nilai = $_GET['id_nilai'];

$error = '';

if (isset($_POST['update'])) {
    $nim        = $_POST['nim'];
    $kodeMatkul = $_POST['kodeMatkul'];
    $nidn       = $_POST['nidn'];
    $nilai      = $_POST['nilai'];
    $nilaiHuruf = $_POST['nilaiHuruf'];

    $query = "UPDATE tbl_nilai 
              SET nim='$nim', kodeMatkul='$kodeMatkul', nidn='$nidn', nilai='$nilai', nilaiHuruf='$nilaiHuruf'
              WHERE id_nilai='$id_nilai'";

    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        header("Location: nilai.php?update=berhasil");
        exit;
    } else {
        $error = "Gagal update data: " . mysqli_error($koneksi);
    }
}

$data = mysqli_query($koneksi, "SELECT * FROM tbl_nilai WHERE id_nilai='$id_nilai'");
$row = mysqli_fetch_assoc($data);

$mahasiswa = mysqli_query($koneksi, "SELECT nim, nama FROM tbl_mahasiswa ORDER BY nama ASC");

$matkul = mysqli_query($koneksi, "SELECT kodeMatkul, namaMatkul FROM tbl_matkul ORDER BY namaMatkul ASC");

$dosen = mysqli_query($koneksi, "SELECT nidn, nama FROM tbl_dosen ORDER BY nama ASC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-5">
        <h3 class="mb-4">✏️ Edit Data Nilai</h3>

        <?php if ($error) { ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php } ?>

        <form action="" method="POST">

            <div class="mb-3">
                <label>Mahasiswa</label>
                <select name="nim" class="form-select" required>
                    <option value="">-- Pilih Mahasiswa --</option>
                    <?php while ($m = mysqli_fetch_assoc($mahasiswa)) { ?>
                        <option value="<?= $m['nim'] ?>" <?= ($m['nim'] == $row['nim']) ? 'selected' : '' ?>>
                            <?= $m['nama'] ?> (<?= $m['nim'] ?>)
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Mata Kuliah</label>
                <select name="kodeMatkul" class="form-select" required>
                    <option value="">-- Pilih Mata Kuliah --</option>
                    <?php while ($k = mysqli_fetch_assoc($matkul)) { ?>
                        <option value="<?= $k['kodeMatkul'] ?>" <?= ($k['kodeMatkul'] == $row['kodeMatkul']) ? 'selected' : '' ?>>
                            <?= $k['namaMatkul'] ?> (<?= $k['kodeMatkul'] ?>)
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Dosen</label>
                <select name="nidn" class="form-select" required>
                    <option value="">-- Pilih Dosen --</option>
                    <?php while ($d = mysqli_fetch_assoc($dosen)) { ?>
                        <option value="<?= $d['nidn'] ?>" <?= ($d['nidn'] == $row['nidn']) ? 'selected' : '' ?>>
                            <?= $d['nama'] ?> (<?= $d['nidn'] ?>)
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Nilai Angka</label>
                <input type="number" name="nilai" class="form-control" value="<?= $row['nilai'] ?>" required min="0" max="100">
            </div>

            <div class="mb-3">
                <label>Nilai Huruf</label>
                <input type="text" name="nilaiHuruf" class="form-control" value="<?= $row['nilaiHuruf'] ?>" required maxlength="2">
            </div>

            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="nilai.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

</body>

</html>