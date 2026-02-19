<?php

declare(strict_types=1);

namespace MythicalCreatures;

class Werewolf
{
    private string $name;
    private string $location;
    private bool $human;
    private bool $hungry;

    public function __construct(string $name, string $location = '')
    {
        $this->name = $name;
        $this->location = $location;
        $this->human = true;
        $this->hungry = false;
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function getLocation(): string
    {
        return $this->location;
    }
    public function isHuman(): bool
    {
        return $this->human;
    }
    public function change(): void
    {
        $this->human = !$this->human;
        $this->hungry = !$this->hungry;
    }
    public function isWolf(): bool
    {
        return !$this->human;
    }
    public function isHungry(): bool
    {
        return $this->hungry;
    }
    public function consume(Victim $victim): void
    {
        if ($this->isWolf()) {
            $victim->setStatus('dead');
            $this->hungry = false;
        }
    }
}
