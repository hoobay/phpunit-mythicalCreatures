<?php

declare(strict_types=1);

namespace MythicalCreatures;

class Vampire
{
    private string $name;
    private string $pet;
    private bool $thirsty;
    
    public function __construct(string $name = '', string $pet = 'bat', bool $thirsty = true)
    {
        $this->name = $name;
        $this->pet = $pet;
        $this->thirsty = $thirsty;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPet(): string
    {
        return $this->pet;
    }

    public function isThirsty(): bool
    {
        return $this->thirsty;
    }

    public function drink(): bool
    {
        $this->thirsty = false;
        return $this->thirsty;
    }
}