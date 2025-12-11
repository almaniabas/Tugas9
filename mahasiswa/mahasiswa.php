<?php
include "../koneksi.php";
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
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Angkatan</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa ORDER BY nim ASC");
                while ($row = mysqli_fetch_assoc($data)) {
                    echo "
                <tr>
                    <td>{$row['nim']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['prodi']}</td>
                    <td>{$row['angkatan']}</td>
                    <td>{$row['email']}</td>
                    <td>
                        <a href='edit_mahasiswa.php?nim={$row['nim']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='hapus_mahasiswa.php?nim={$row['nim']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Hapus mahasiswa ini?\")'>Hapus</a>
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