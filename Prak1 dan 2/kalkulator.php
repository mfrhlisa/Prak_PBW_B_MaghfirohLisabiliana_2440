<?php
$hasil = null;
$pesan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = (float) ($_POST['a'] ?? 0);
    $b = (float) ($_POST['b'] ?? 0);
    $operator = $_POST['operator'] ?? '+';

    switch ($operator) {
        case '+':
            $hasil = $a + $b;
            break;
        case '-':
            $hasil = $a - $b;
            break;
        case '*':
            $hasil = $a * $b;
            break;
        case '/':
            if ($b == 0) {
                $pesan = 'Pembagian dengan nol tidak diperbolehkan.';
            } else {
                $hasil = $a / $b;
            }
            break;
        // MODIFIKASI 1: Penambahan operator Modulus (%) beserta validasi pembagian dengan nol
        case '%':
            if ($b == 0) {
                $pesan = 'Modulus dengan nol tidak diperbolehkan.';
            } else {
                $hasil = $a % $b;
            }
            break;
        default:
            $pesan = 'Operator tidak valid.';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kalkulator Modifikasi</title>
    <style>
        /* MODIFIKASI 2: Penambahan Styling CSS agar tampilan berbentuk Card */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            padding-top: 50px;
        }
        .calc-card {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        h1 {
            color: #343a40;
            border-bottom: 3px solid #007bff;
            padding-bottom: 10px;
            margin-top: 0;
            font-size: 24px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 20px;
        }
        input, select, button {
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            font-weight: bold;
            border: none;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        .alert {
            color: #dc3545;
            font-weight: bold;
            margin-top: 15px;
        }
        .result {
            color: #28a745;
            font-size: 20px;
            font-weight: bold;
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <!-- Pembungkus komponen agar CSS Card berfungsi -->
    <div class="calc-card">
        <h1>Kalkulator Sederhana</h1>
        <form method="post">
            <input type="number" step="any" name="a" required placeholder="Angka Pertama">
            <select name="operator">
                <!-- Penambahan atribut value agar lebih spesifik -->
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
                <!-- MODIFIKASI 3: Penambahan opsi Modulus pada antarmuka form -->
                <option value="%">% (Modulus)</option>
            </select>
            <input type="number" step="any" name="b" required placeholder="Angka Kedua">
            <button type="submit">Hitung</button>
        </form>
        
        <?php if ($pesan): ?>
            <p class="alert"><?= htmlspecialchars($pesan) ?></p>
        <?php elseif ($hasil !== null): ?>
            <p class="result">Hasil: <?= htmlspecialchars((string)$hasil) ?></p>
        <?php endif; ?>
    </div>
</body>
</html>