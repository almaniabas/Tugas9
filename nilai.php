<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Nilai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-5">
        <h3 class="mb-4 text-center">📝 Data Nilai Mahasiswa</h3>

        <table class="table table-striped table-hover shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Mahasiswa</th>
                    <th>Mata Kuliah</th>
                    <th>Dosen</th>
                    <th>Nilai Angka</th>
                    <th>Huruf</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "
                SELECT n.id_nilai, m.nama AS nama_mhs, mk.namaMatkul, d.nama AS nama_dosen, 
                       n.nilai, n.nilaiHuruf
                FROM tbl_nilai n
                JOIN tbl_mahasiswa m ON n.nim = m.nim
                JOIN tbl_matkul mk ON n.kodeMatkul = mk.kodeMatkul
                JOIN tbl_dosen d ON n.nidn = d.nidn
                ORDER BY n.id_nilai ASC
            ";

                $data = mysqli_query($koneksi, $query);
                while ($row = mysqli_fetch_assoc($data)) {
                    echo "
                <tr>
                    <td>{$row['id_nilai']}</td>
                    <td>{$row['nama_mhs']}</td>
                    <td>{$row['namaMatkul']}</td>
                    <td>{$row['nama_dosen']}</td>
                    <td>{$row['nilai']}</td>
                    <td>{$row['nilaiHuruf']}</td>
                </tr>";
                }
                ?>
            </tbody>
        </table>

        <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
    </div>

</body>

</html>