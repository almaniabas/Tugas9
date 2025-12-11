<?php include "../koneksi.php"; ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-5">
        <h3 class="mb-4">➕ Tambah Mata Kuliah</h3>

        <form action="" method="POST">

            <div class="mb-3">
                <label>Kode Mata Kuliah</label>
                <input type="text" name="kodeMatkul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nama Mata Kuliah</label>
                <input type="text" name="namaMatkul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Jumlah SKS</label>
                <input type="number" name="sks" class="form-control" min="1" max="6" required>
            </div>

            <div class="mb-3">
                <label>Dosen Pengampu</label>
                <select name="nidn" class="form-select" required>
                    <option value="">-- Pilih Dosen --</option>
                    <?php
                    $dosen = mysqli_query($koneksi, "SELECT * FROM tbl_dosen ORDER BY nama ASC");
                    while ($d = mysqli_fetch_assoc($dosen)) {
                        echo "<option value='{$d['nidn']}'>{$d['nama']} ({$d['nidn']})</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
            <a href="matkul.php" class="btn btn-secondary">Kembali</a>

        </form>

        <?php
        if (isset($_POST['simpan'])) {
            $kode   = $_POST['kodeMatkul'];
            $nama   = $_POST['namaMatkul'];
            $sks    = $_POST['sks'];
            $nidn   = $_POST['nidn'];

            $query = "INSERT INTO tbl_matkul (kodeMatkul, namaMatkul, sks, nidn) 
                      VALUES ('$kode', '$nama', '$sks', '$nidn')";
            $hasil = mysqli_query($koneksi, $query);

            if ($hasil) {
                header("Location: matkul.php");
                exit;
            } else {
                echo "Gagal menyimpan: " . mysqli_error($koneksi);
            }
        }
        ?>

    </div>
</body>

</html>