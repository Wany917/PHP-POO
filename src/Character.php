<?php

class Character
{
    public function __construct(
        protected float $health,
        protected float $defenseRatio,
        protected int $attackDamages,
        protected int $magicDamages,
    ) {}

    public function getHealth()
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

    public function getAttackDamages()
    {
        return $this->attackDamages;
    }

    public function getMagicDamages()
    {
        return $this->magicDamages;
    }

    public function getDefenseRatio()
    {
        return $this->defenseRatio;
    }

    public function isDamaged(int $physicalDamages, int $magicalDamages)
    {
        $damages = $physicalDamages + $magicalDamages;
        $this->setHealth(
            $this->getHealth() - ($damages - $damages * $this->getDefenseRatio())
        );
    }

    public function __toString()
    {
        return static::class;
    }
}
