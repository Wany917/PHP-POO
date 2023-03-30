<?php

require_once('./src/Character.php');

class Soldier extends Character
{
    public function __construct(
        float $health,
        float $defenseRatio,
        int $attackDamages,
    )
    {
        parent::__construct($health, $defenseRatio, $attackDamages, magicDamages: 0);
    }
}
