<?php
// classes/Venonat.php
require_once 'Pokemon.php';

// INHERITANCE: Venonat mewarisi sifat dari Pokemon
class Venonat extends Pokemon {

    public function __construct($level = 5) {
        // Setup data spesifik Venonat
        // Base HP untuk Venonat sekitar 60
        parent::__construct("Venonat", "Bug/Poison", $level, 60 + ($level * 2));
    }

    // POLYMORPHISM: Implementasi unik specialMove untuk Venonat
    public function specialMove() {
        return "<strong>Psybeam!</strong> Venonat menembakkan gelombang aneh ke arah target. Ada kemungkinan membuat musuh bingung.";
    }

    // POLYMORPHISM: Implementasi unik training untuk tipe Bug/Poison
    public function train($trainingType, $intensity) {
        $levelBefore = $this->level;
        $hpBefore = $this->hp;

        // Logika peningkatan stats
        // Intensitas mempengaruhi kenaikan
        $xpGain = $intensity * 10; 
        
        // Naik level setiap latihan (penyederhanaan logika)
        $this->level++;
        
        // Penambahan HP berdasarkan tipe latihan
        $hpGain = 0;
        if ($trainingType == 'Defense') {
            $hpGain = 5 * $intensity; // Defense training gives more HP
        } else {
            $hpGain = 2 * $intensity;
        }

        $this->maxHp += $hpGain;
        $this->hp = $this->maxHp; // Heal saat level up

        // Catat ke riwayat
        $this->addHistory($trainingType, $intensity, $levelBefore, $this->level, $hpBefore, $this->hp);

        return [
            'message' => "Latihan $trainingType selesai!",
            'xp_gain' => $xpGain,
            'hp_gain' => $hpGain
        ];
    }
}
?>