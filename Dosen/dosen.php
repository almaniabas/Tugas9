<?php
include "../koneksi.php";
include "../blok.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-5">
        <h3 class="mb-4 text-center">👨‍🏫 Data Dosen</h3>

        <a href="tambah_dosen.php" class="btn btn-primary mb-3">+ Tambah Dosen</a>

        <table class="table table-striped table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th style="text-align:center">NIDN</th>
                    <th style="text-align:center">Foto</th>
                    <th style="text-align:center">Nama</th>
                    <th style="text-align:center">Prodi</th>
                    <th style="text-align:center">Email</th>
                    <th style="text-align:center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM tbl_dosen ORDER BY nidn ASC");
                while ($dosen = mysqli_fetch_array($data)) {
                    echo "<tr>";
                    echo "<td style='text-align:center'>{$dosen['nidn']}</td>";
                    echo "<td style='text-align:center'>
                    <img src='../folderFoto/{$dosen['foto']}' width='60' height='60'></td>";
                    echo "<td style='text-align:center'>{$dosen['nama']}</td>";
                    echo "<td style='text-align:center'>{$dosen['prodi']}</td>";
                    echo "<td style='text-align:center'>{$dosen['email']}</td>";
                    echo "<td style='text-align:center'>
                            <a href='edit_dosen.php?nidn={$dosen['nidn']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='hapus_dosen.php?nidn={$dosen['nidn']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus dosen ini?\")'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <a href=" ../index.php" class="btn btn-secondary mt-3">Kembali</a>
    </div>

</body>

</html>