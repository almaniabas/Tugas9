<?php include "../koneksi.php"; ?>
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
                    <th>NIDN</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM tbl_dosen ORDER BY nidn ASC");
                while ($row = mysqli_fetch_assoc($data)) {
                    echo "
                <tr>
                    <td>{$row['nidn']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['prodi']}</td>
                    <td>{$row['email']}</td>
                    <td>
                        <a href='edit_dosen.php?nidn={$row['nidn']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='hapus_dosen.php?nidn={$row['nidn']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus dosen ini?\")'>Hapus</a>
                    </td>
                </tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="../index.php" class="btn btn-secondary mt-3">Kembali</a>
    </div>

</body>

</html>