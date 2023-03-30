<?php

require_once('./src/Character.php');

class Wizard extends Character
{
    public function __construct(
        float $health,
        float $defenseRatio,
        int $attackDamages,
        int $magicDamages,
    )
    {
        if ($magicDamages < $attackDamages) {
            throw new Exception("The wizard cannot have more physical damages than magic damages.");
        }
        parent::__construct($health, $defenseRatio, $attackDamages, $magicDamages);
    }
}
