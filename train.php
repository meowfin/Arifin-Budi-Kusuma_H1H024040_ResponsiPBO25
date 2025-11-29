<?php
session_start();
require_once 'classes/Venonat.php';

if (!isset($_SESSION['myPokemon'])) {
    header("Location: index.php");
    exit;
}

$pokemon = unserialize($_SESSION['myPokemon']);
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'];
    $intensity = (int)$_POST['intensity'];

    // Lakukan Training
    $result = $pokemon->train($type, $intensity);
    
    // Simpan kembali objek yang sudah diupdate ke sesi
    $_SESSION['myPokemon'] = serialize($pokemon);
    
    $message = "
    <div class='card' style='background-color: #dff9fb; border-color: #badc58;'>
        <h3>Hasil Latihan!</h3>
        <p>{$result['message']}</p>
        <ul>
            <li>Level Up! Sekarang Level <strong>{$pokemon->getLevel()}</strong></li>
            <li>Max HP bertambah <strong>+{$result['hp_gain']}</strong></li>
            <li>Jurus: {$pokemon->specialMove()}</li>
        </ul>
    </div>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PokéCare - Training</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Training Area</h1>
        
        <?php if($message) echo $message; ?>

        <div class="card">
            <h3>Pilih Program Latihan untuk <?= $pokemon->getName(); ?></h3>
            <form method="POST">
                <div style="margin-bottom: 15px;">
                    <label>Jenis Latihan:</label><br>
                    <select name="type" class="btn" style="background: white; color: black; border: 1px solid #ccc; width: 100%;">
                        <option value="Attack">Attack Training (Focus on Power)</option>
                        <option value="Defense">Defense Training (Focus on HP)</option>
                        <option value="Speed">Speed Training (Agility)</option>
                    </select>
                </div>
                
                <div style="margin-bottom: 15px;">
                    <label>Intensitas (1 - 5):</label><br>
                    <input type="range" name="intensity" min="1" max="5" value="1" oninput="this.nextElementSibling.value = this.value" style="width: 100%;">
                    <output>1</output>
                </div>

                <button type="submit" class="btn">Lakukan Latihan</button>
            </form>
        </div>

        <div style="text-align: center;">
            <a href="index.php" class="btn btn-secondary">Kembali ke Beranda</a>
            <a href="history.php" class="btn btn-secondary">Lihat Riwayat</a>
        </div>
    </div>
</body>
</html>