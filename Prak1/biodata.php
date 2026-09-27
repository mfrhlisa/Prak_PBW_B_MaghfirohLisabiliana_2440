<?php

function statuskelulusan(float $ipk): string
{
    if ($ipk >= 3.50) return 'Sangat memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu peningkatan';
}
// MODIFIKASI 1: Logika baru untuk menentukan class warna badge berdasarkan IPK
function warnabadge(float $ipk): string
{
    if ($ipk >= 3.50) return 'badge-hijau';
    if ($ipk >= 3.00) return 'badge-kuning';
    return 'badge-merah';
}

$mahasiswa = [
    'nim' => '4524210040',
    'nama' => 'Maghfiroh Lisabiliana',
    // MODIFIKASI 2: Penambahan dua field baru (fakultas & email) pada array
    'fakultas' => 'Teknik', 
    'email' => 'mgfrhli4524040@univpancasila.ac.id',
    'prodi' => 'Teknik Informatika',
    'semester' => '5',
    'ipk' => '2.50',
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Biodata Mahasiswa</title>
    <style>
        /* MODIFIKASI 3: Tampilan CSS modern berbasis Card & Badge Dinamis*/
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }
        .biodata-card {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 450px;
        }
        h1 {
            text-align: center;
            color: #343a40;
            border-bottom: 3px solid #007bff;
            padding-bottom: 10px;
            margin-top: 0;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            padding: 10px 0;
            border-bottom: 1px dashed #dee2e6;
            font-size: 16px;
            color: #495057;
        }
        .label {
            font-weight: bold;
            display: inline-block;
            width: 100px; 
            color: #212529;
        }
        .predikat-container {
            margin-top: 20px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }
        .badge {
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 16px;
        }
        /* Class warna spesifik yang dikontrol oleh PHP */
        .badge-hijau { background-color: #28a745; }
        .badge-kuning { background-color: #ffc107; }
        .badge-merah { background-color: #dc3545; }
    </style>
</head>

<body>
    <!-- Pembungkus komponen utama berbentuk card -->
    <div class="biodata-card">
        <h1>Biodata Mahasiswa</h1>
        <ul>
            <?php foreach ($mahasiswa as $kunci => $nilai): ?>
                <li>
                    <span class="label"><?= ucfirst($kunci) ?></span> : 
                    <?= htmlspecialchars((string)$nilai) ?>
                </li>
            <?php endforeach; ?>
        </ul>
        
        <div class="predikat-container">
            <!-- MODIFIKASI 4: Pemanggilan fungsi warna badge dinamis pada HTML -->
            Predikat: <span class="badge <?= warnabadge((float)$mahasiswa['ipk']) ?>">
                <?= statuskelulusan((float)$mahasiswa['ipk']) ?>
            </span>
        </div>
    </div>
</body>
</html>