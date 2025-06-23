<?php
include 'includes/header.php';

// Ambil data dari form
$kriteria = $_POST['kriteria'];
$bobot = $_POST['bobot'];
$nama_alternatif = $_POST['nama_alternatif'];

// Data alternatif
$alternatif = [
    'A1' => [
        'nama' => $nama_alternatif[0],
        'nilai' => [
            $_POST['a1_c1'], $_POST['a1_c2'], $_POST['a1_c3'],
            $_POST['a1_c4'], $_POST['a1_c5'], $_POST['a1_c6']
        ]
    ],
    'A2' => [
        'nama' => $nama_alternatif[1],
        'nilai' => [
            $_POST['a2_c1'], $_POST['a2_c2'], $_POST['a2_c3'],
            $_POST['a2_c4'], $_POST['a2_c5'], $_POST['a2_c6']
        ]
    ],
    'A3' => [
        'nama' => $nama_alternatif[2],
        'nilai' => [
            $_POST['a3_c1'], $_POST['a3_c2'], $_POST['a3_c3'],
            $_POST['a3_c4'], $_POST['a3_c5'], $_POST['a3_c6']
        ]
    ],
    'A4' => [
        'nama' => $nama_alternatif[3],
        'nilai' => [
            $_POST['a4_c1'], $_POST['a4_c2'], $_POST['a4_c3'],
            $_POST['a4_c4'], $_POST['a4_c5'], $_POST['a4_c6']
        ]
    ],
    'A5' => [
        'nama' => $nama_alternatif[4],
        'nilai' => [
            $_POST['a5_c1'], $_POST['a5_c2'], $_POST['a5_c3'],
            $_POST['a5_c4'], $_POST['a5_c5'], $_POST['a5_c6']
        ]
    ]
];

// Hitung total bobot
$total_bobot = array_sum($bobot);

// Normalisasi bobot
$bobot_normalized = [];
foreach ($bobot as $b) {
    $bobot_normalized[] = $b / $total_bobot;
}

// Cari nilai min dan max untuk setiap kriteria
$min_values = [];
$max_values = [];

for ($i = 0; $i < 6; $i++) {
    $values = [];
    foreach ($alternatif as $a) {
        $values[] = $a['nilai'][$i];
    }
    $min_values[$i] = min($values);
    $max_values[$i] = max($values);
}

// Hitung utilitas untuk setiap alternatif
$utilitas = [];
foreach ($alternatif as $key => $a) {
    $utilitas[$key] = [];
    for ($i = 0; $i < 6; $i++) {
        if ($max_values[$i] - $min_values[$i] == 0) {
            $utilitas[$key][$i] = 0;
        } else {
            $utilitas[$key][$i] = ($a['nilai'][$i] - $min_values[$i]) / ($max_values[$i] - $min_values[$i]);
        }
    }
}

// Hitung nilai akhir
$nilai_akhir = [];
foreach ($alternatif as $key => $a) {
    $total = 0;
    for ($i = 0; $i < 6; $i++) {
        $total += $bobot_normalized[$i] * $utilitas[$key][$i];
    }
    $nilai_akhir[$key] = $total;
}

// Urutkan alternatif berdasarkan nilai akhir
arsort($nilai_akhir);
?>

<div class="container">
    <h1>Hasil Perhitungan Metode SMART</h1>
    
    <div class="result-section">
        <h2>Normalisasi Bobot</h2>
        <table class="result-table">
            <thead>
                <tr>
                    <th>Kode Kriteria</th>
                    <th>Kriteria</th>
                    <th>Bobot Awal</th>
                    <th>Bobot Normalisasi</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($kriteria); $i++): ?>
                <tr>
                    <td>C<?= $i+1 ?></td>
                    <td><?= $kriteria[$i] ?></td>
                    <td><?= $bobot[$i] ?></td>
                    <td><?= number_format($bobot_normalized[$i], 4) ?></td>
                </tr>
                <?php endfor; ?>
                <tr>
                    <td colspan="2"><strong>Total</strong></td>
                    <td><strong><?= $total_bobot ?></strong></td>
                    <td><strong>1.0000</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="result-section">
        <h2>Nilai Utilitas</h2>
        <table class="result-table">
            <thead>
                <tr>
                    <th>Alternatif</th>
                    <th>C1</th>
                    <th>C2</th>
                    <th>C3</th>
                    <th>C4</th>
                    <th>C5</th>
                    <th>C6</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($utilitas as $key => $u): ?>
                <tr>
                    <td><?= $alternatif[$key]['nama'] ?></td>
                    <?php for ($i = 0; $i < 6; $i++): ?>
                    <td><?= number_format($u[$i], 3) ?></td>
                    <?php endfor; ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <div class="result-section">
        <h2>Hasil Akhir dan Ranking</h2>
        <table class="result-table">
            <thead>
                <tr>
                    <th>Ranking</th>
                    <th>Alternatif</th>
                    <th>Nilai Akhir</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $rank = 1; foreach ($nilai_akhir as $key => $na): ?>
                <tr>
                    <td><?= $rank++ ?></td>
                    <td><?= $alternatif[$key]['nama'] ?></td>
                    <td><?= number_format($na, 4) ?></td>
                    <td>Rekomendasi Pilihan <?= $rank-1 ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <div class="conclusion">
        <h2>Kesimpulan</h2>
        <p>Berdasarkan perhitungan yang sudah dilakukan menggunakan metode <strong>SMART</strong> untuk mencari laptop terbaik berdasarkan kriteria yang sudah ditentukan, maka hasil terbaik jatuh kepada:</p>
        
        <?php 
        $top_alternative = array_key_first($nilai_akhir);
        $top_nama = $alternatif[$top_alternative]['nama'];
        $top_nilai = number_format($nilai_akhir[$top_alternative], 4);
        ?>
        
        <div class="top-alternative">
            <h3><?= $top_nama ?> dengan nilai akhir <?= $top_nilai ?></h3>
            
            <p>Keunggulan terletak pada:</p>
            <ul>
                <?php for ($i = 0; $i < 6; $i++): ?>
                <li><?= $kriteria[$i] ?> = <?= $alternatif[$top_alternative]['nilai'][$i] ?></li>
                <?php endfor; ?>
            </ul>
        </div>
        
        <a href="index.php" class="btn">Kembali</a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>