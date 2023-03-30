<?php

require_once('./src/Archer.php');
require_once('./src/Soldier.php');

$archer = new Archer(health: 100, defenseRatio: 0.05, attackDamages: 17);
$soldier = new Soldier(120, 0.15, 14);

while (!$archer->isDead() && !$soldier->isDead()) {
    $archer->isDamaged($soldier->getAttackDamages());
    echo "L'archer a {$archer->getHealth()} points de vie".PHP_EOL;
    if (!$archer->isDead()) {
        $soldier->isDamaged($archer->getAttackDamages());
        echo "Le soldat a {$soldier->getHealth()} points de vie".PHP_EOL;
    }
    echo PHP_EOL;
}

if ($archer->isDead()) {
    echo "Le soldat a gagné !";
}
if ($soldier->isDead()) {
    echo "L'archer a gagné !";
}
echo PHP_EOL;
