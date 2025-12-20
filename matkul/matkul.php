<?php
include "../koneksi.php";
include "../blok.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-5">
        <h3 class="mb-4 text-center">📘 Data Mata Kuliah</h3>

        <a href="tambah_matkul.php" class="btn btn-primary mb-3">+ Tambah Mata Kuliah</a>

        <table class="table table-striped table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th style="text-align:center">Kode</th>
                    <th style="text-align:center">Mata Kuliah</th>
                    <th style="text-align:center">SKS</th>
                    <th style="text-align:center">NIDN Dosen</th>
                    <th style="text-align:center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM tbl_matkul ORDER BY kodeMatkul ASC");
                while ($row = mysqli_fetch_assoc($data)) {
                    echo "
                <tr>
                    <td style='text-align:center'>{$row['kodeMatkul']}</td>
                    <td style='text-align:center'>{$row['namaMatkul']}</td>
                    <td style='text-align:center'>{$row['sks']}</td>
                    <td style='text-align:center'>{$row['nidn']}</td>
                    <td style='text-align:center'>
                        <a href='edit_matkul.php?kodeMatkul={$row['kodeMatkul']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='hapus_matkul.php?kodeMatkul={$row['kodeMatkul']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus mata kuliah ini?\")'>Hapus</a>
                    </td>
                </tr>";
                }
                ?>
            </tbody>
        </table>

        <a href=" ../index.php" class="btn btn-secondary mt-3">Kembali</a>
    </div>

</body>

</html>