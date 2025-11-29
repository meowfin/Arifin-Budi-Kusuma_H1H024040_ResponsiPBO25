<?php
session_start();
require_once 'classes/Venonat.php';

// Cek apakah Pokemon sudah ada di sesi, jika belum, buat baru
if (!isset($_SESSION['myPokemon'])) {
    $_SESSION['myPokemon'] = serialize(new Venonat(5)); // Mulai level 5
}

// Ambil objek dari sesi
$pokemon = unserialize($_SESSION['myPokemon']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PokéCare - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>PokéCare: Research Center</h1>
        <h2>Status Pokémon</h2>
        
         

        <div class="card">
            <div class="stat-box"><strong>Nama:</strong> <span><?= $pokemon->getName(); ?></span></div>
            <div class="stat-box"><strong>Tipe:</strong> <span><?= $pokemon->getType(); ?></span></div>
            <div class="stat-box"><strong>Level:</strong> <span><?= $pokemon->getLevel(); ?></span></div>
            <div class="stat-box"><strong>HP:</strong> <span><?= $pokemon->getHp(); ?> / <?= $pokemon->getMaxHp(); ?></span></div>
            <div class="stat-box">
                <strong>Jurus Spesial:</strong> 
                <span><?= $pokemon->specialMove(); ?></span>
            </div>
        </div>

        <div style="text-align: center;">
            <a href="train.php" class="btn">Mulai Latihan</a>
            <a href="history.php" class="btn btn-secondary">Riwayat Latihan</a>
        </div>
        
        <div style="text-align: center; margin-top: 20px; font-size: 12px;">
            <form method="post">
                <button type="submit" name="reset" style="color: red; border: none; background: none; cursor: pointer;">[Reset Data]</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
if(isset($_POST['reset'])) {
    session_destroy();
    header("Location: index.php");
}
?>