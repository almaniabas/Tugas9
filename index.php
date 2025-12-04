<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Kampus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(to bottom right, #eef2f3, #dfe9f3);
            min-height: 100vh;
            font-family: "Poppins", sans-serif;
        }

        .header-box {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
            margin-bottom: 40px;
        }

        .identity {
            font-size: 16px;
            color: #555;
        }

        .name-title {
            font-size: 20px;
            font-weight: 700;
        }

        .card-menu {
            background: white;
            border-radius: 18px;
            transition: all 0.3s ease;
            border: none;
        }

        .card-menu:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .card-menu h5 {
            font-weight: 600;
            color: #333;
        }
    </style>
</head>

<body>

    <div class="container py-5">

        <!-- HEADER IDENTITAS -->
        <div class="header-box text-center">
            <h2 class="fw-bold mb-1">📚 SISTEM INFORMASI AKADEMIK</h2>
            <p class="identity mb-0">
                <span class="name-title">Al Amani Abas</span> <br>
                NIM: <b>202404020</b> • Prodi: <b>TRPL</b> • Angkatan: <b>2024</b>
            </p>
        </div>

        <!-- MENU -->
        <div class="row g-4">
            <div class="col-md-3">
                <a href="mahasiswa.php" class="text-decoration-none">
                    <div class="card shadow-sm card-menu p-4 text-center">
                        <h5>👨‍🎓 Data Mahasiswa</h5>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="dosen.php" class="text-decoration-none">
                    <div class="card shadow-sm card-menu p-4 text-center">
                        <h5>👨‍🏫 Data Dosen</h5>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="matkul.php" class="text-decoration-none">
                    <div class="card shadow-sm card-menu p-4 text-center">
                        <h5>📘 Data Mata Kuliah</h5>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="nilai.php" class="text-decoration-none">
                    <div class="card shadow-sm card-menu p-4 text-center">
                        <h5>📝 Data Nilai</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>

</body>

</html>