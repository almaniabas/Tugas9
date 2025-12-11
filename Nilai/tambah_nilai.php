<?php
include "../koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-5">
        <h3 class="mb-4">➕ Tambah Nilai Mahasiswa</h3>

        <form action="simpan_nilai.php" method="POST">

            <div class="mb-3">
                <label>Mahasiswa</label>
                <select name="nim" class="form-select" required>
                    <option value="">-- Pilih Mahasiswa --</option>
                    <?php
                    $mahasiswa = mysqli_query($koneksi, "SELECT nim, nama FROM tbl_mahasiswa ORDER BY nama ASC");
                    while ($m = mysqli_fetch_assoc($mahasiswa)) {
                        echo "<option value='{$m['nim']}'>{$m['nama']} ({$m['nim']})</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Mata Kuliah</label>
                <select name="kodeMatkul" class="form-select" required>
                    <option value="">-- Pilih Mata Kuliah --</option>
                    <?php
                    $matkul = mysqli_query($koneksi, "SELECT kodeMatkul, namaMatkul FROM tbl_matkul ORDER BY namaMatkul ASC");
                    while ($mk = mysqli_fetch_assoc($matkul)) {
                        echo "<option value='{$mk['kodeMatkul']}'>{$mk['namaMatkul']} ({$mk['kodeMatkul']})</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Dosen Pengampu</label>
                <select name="nidn" class="form-select" required>
                    <option value="">-- Pilih Dosen --</option>
                    <?php
                    $dosen = mysqli_query($koneksi, "SELECT nidn, nama FROM tbl_dosen ORDER BY nama ASC");
                    while ($d = mysqli_fetch_assoc($dosen)) {
                        echo "<option value='{$d['nidn']}'>{$d['nama']} ({$d['nidn']})</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label>Nilai Angka</label>
                <input type="number" name="nilai" class="form-control" min="0" max="100" required>
            </div>

            <div class="mb-3">
                <label>Nilai Huruf</label>
                <input type="text" name="nilaiHuruf" class="form-control" maxlength="2" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="nilai.php" class="btn btn-secondary">Kembali</a>

        </form>
    </div>

</body>

</html>