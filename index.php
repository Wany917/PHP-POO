<?php

require_once('./src/Character.php');

$archer = new Character(health: 100, defenseRatio: 0.05, attackDamages: 17);
$soldier = new Character(120, 0.15, 14);

while (!$archer->isDead() && !$soldier->isDead()) {
    $archer->setHealth($archer->getHealth() - $soldier->getAttackDamages() - ($soldier->getAttackDamages() * $archer->getDefenseRatio()));
    echo "L'archer a {$archer->getHealth()} points de vie".PHP_EOL;
    if (!$archer->isDead()) {
        $soldier->setHealth($soldier->getHealth() - $archer->getAttackDamages() - ($archer->getAttackDamages() * $soldier->getDefenseRatio()));
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
