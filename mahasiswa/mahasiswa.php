<?php
include "../koneksi.php";
include "../blok.php";
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-5">
        <h3 class="mb-4 text-center">👨‍🎓 Data Mahasiswa</h3>

        <a href="tambah_mahasiswa.php" class="btn btn-primary mb-3">+ Tambah Mahasiswa</a>

        <table class="table table-striped table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th style="text-align:center">NIM</th>
                    <th style="text-align:center">Foto</th>
                    <th style="text-align:center">Nama</th>
                    <th style="text-align:center">Prodi</th>
                    <th style="text-align:center">Email</th>
                    <th style="text-align:center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa ORDER BY nim ASC");
                while ($mhs = mysqli_fetch_array($data)) {
                    echo "<tr>";
                    echo "<td style='text-align:center'>{$mhs['nim']}</td>";
                    echo "<td style='text-align:center'>
                    <img src='../folderFoto/{$mhs['foto']}' width='60' height='60'></td>";
                    echo "<td style='text-align:center'>{$mhs['nama']}</td>";
                    echo "<td style='text-align:center'>{$mhs['prodi']}</td>";
                    echo "<td style='text-align:center'>{$mhs['email']}</td>";
                    echo "<td style='text-align:center'>
                            <a href='edit_mahasiswa.php?nim={$mhs['nim']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='hapus_mahasiswa.php?nim={$mhs['nim']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus mahasiswa ini?\")'>Hapus</a>
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