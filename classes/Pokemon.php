<?php
// classes/Pokemon.php

abstract class Pokemon {
    // ENCAPSULATION: Properti dilindungi (protected)
    protected $name;
    protected $type;
    protected $level;
    protected $hp;
    protected $maxHp;
    protected $trainingHistory = [];

    public function __construct($name, $type, $level, $hp) {
        $this->name = $name;
        $this->type = $type;
        $this->level = $level;
        $this->hp = $hp;
        $this->maxHp = $hp; // Set HP awal sebagai Max HP
    }

    // Getters
    public function getName() { return $this->name; }
    public function getType() { return $this->type; }
    public function getLevel() { return $this->level; }
    public function getHp() { return $this->hp; }
    public function getMaxHp() { return $this->maxHp; }
    public function getHistory() { return $this->trainingHistory; }

    // ABSTRACTION: Method ini harus diimplementasikan oleh child class
    abstract public function specialMove();
    abstract public function train($type, $intensity);

    // Method umum untuk mencatat log
    protected function addHistory($type, $intensity, $levelBefore, $levelAfter, $hpBefore, $hpAfter) {
        $this->trainingHistory[] = [
            'type' => $type,
            'intensity' => $intensity,
            'level_before' => $levelBefore,
            'level_after' => $levelAfter,
            'hp_before' => $hpBefore,
            'hp_after' => $hpAfter,
            'time' => date('Y-m-d H:i:s')
        ];
    }
}
?>