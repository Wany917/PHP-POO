<?php

namespace Eliot\Character;

use Eliot\Contracts\DealsPhysicalDamages;
use Eliot\Contracts\DealsMagicDamages;
use Eliot\HasWeapon;
use Eliot\Weapon\Weapon;

abstract class Character implements DealsPhysicalDamages, DealsMagicDamages
{
    use HasWeapon;

    protected ?Weapon $weapon = null;

    public function __construct(
        protected float $health,
        protected float $defenseRatio,
        protected int $attackDamages,
        protected int $magicDamages,
    ) {}

    public function getHealth(): float
    {
        return $this->health;
    }

    public function setHealth(float $health)
    {
        if ($health < 0) {
            $this->health = 0;
        } else {
            $this->health = round($health, 2);
        }
    }

    public function isDead()
    {
        return $this->health == 0;
    }

    public function getAttackDamages(): float
    {
        if ($this->hasWeapon()) {
            return $this->attackDamages + $this->weapon->getAttackDamages();
        }
        return $this->attackDamages;
    }

    public function getMagicDamages(): float
    {
        if ($this->hasWeapon()) {
            return $this->magicDamages + $this->weapon->getMagicDamages();
        }
        return $this->magicDamages;
    }

    public function getDefenseRatio()
    {
        return $this->defenseRatio;
    }

    public function attacks(Character $character)
    {
        // echo "{$this} attaque {$character}";
        if ($this->hasWeapon()) {
        //     echo " avec {$this->weapon}";
        }
        // echo " !".PHP_EOL;

        $character->takesDamagesFrom($this);
    }
    
    public function takesDamagesFrom(Character $character)
    {
        $damages = $this->takesPhysicalDamagesFrom($character) + $this->takesMagicalDamagesFrom($character);
        $this->setHealth(
            $this->getHealth() - ($damages * (1 - $this->getDefenseRatio()))
        );
    }

    protected function takesPhysicalDamagesFrom(Character $character)
    {
        return $character->getAttackDamages();
    }

    protected function takesMagicalDamagesFrom(Character $character)
    {
        return $character->getMagicDamages();
    }

    public function __toString()
    {
        return static::class;
    }
}
