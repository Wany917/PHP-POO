<?php

require_once('./src/Archer.php');
require_once('./src/Soldier.php');
require_once('./src/Wizard.php');

$archer = new Archer(health: 100, defenseRatio: 0.05, attackDamages: 17, magicDamages: 3);
$soldier = new Soldier(120, 0.25, 20);
$wizard = new Wizard(health: 90, defenseRatio: 0.1, attackDamages: 4, magicDamages: 15);

$queue = [$archer, $soldier, $wizard];

shuffle($queue);

while (count($queue) > 1) {
    $attacker = array_shift($queue);
    $key = array_rand($queue);
    $attackee = $queue[$key];

    echo "{$attacker} attaque {$attackee} !".PHP_EOL;
    $attackee->isDamaged($attacker->getAttackDamages(), $attacker->getMagicDamages());

    array_unshift($queue, $attacker);
    if ($attackee->isDead()) {
        unset($queue[$key]);
        echo "{$attackee} est mort".PHP_EOL;
        echo PHP_EOL;
        shuffle($queue);
        continue;
    }
    
    echo "{$attackee} a {$attackee->getHealth()} points de vie".PHP_EOL;
    echo PHP_EOL;
    shuffle($queue);
}

$winner = array_pop($queue);
echo "==================".PHP_EOL;
echo "{$winner} a gagné !".PHP_EOL;
echo "==================".PHP_EOL;


echo PHP_EOL;
