<?php
session_start();
require_once 'classes/Venonat.php';

if (!isset($_SESSION['myPokemon'])) {
    header("Location: index.php");
    exit;
}

$pokemon = unserialize($_SESSION['myPokemon']);
$histories = $pokemon->getHistory();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PokéCare - History</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Data Log Latihan</h1>
        <h3>Riwayat Aktivitas: <?= $pokemon->getName(); ?></h3>

        <?php if (empty($histories)): ?>
            <p style="text-align: center;">Belum ada data latihan.</p>
        <?php else: ?>
            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <th>Waktu</th>
                            <th>Jenis Latihan</th>
                            <th>Intensitas</th>
                            <th>Level (Pre -> Post)</th>
                            <th>HP (Pre -> Post)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (array_reverse($histories) as $log): ?>
                        <tr>
                            <td><?= $log['time']; ?></td>
                            <td><?= $log['type']; ?></td>
                            <td><?= $log['intensity']; ?></td>
                            <td><?= $log['level_before']; ?> &rarr; <?= $log['level_after']; ?></td>
                            <td><?= $log['hp_before']; ?> &rarr; <?= $log['hp_after']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <div style="text-align: center; margin-top: 20px;">
            <a href="index.php" class="btn btn-secondary">Kembali ke Beranda</a>
            <a href="train.php" class="btn">Latihan Lagi</a>
        </div>
    </div>
</body>
</html>