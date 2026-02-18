<?php

declare(strict_types=1);

namespace MythicalCreatures;

class Dragon {
    private string $name;
    private string $color;
    private string $rider;
    private bool $hungry;
    private int $eatCount;

    public function __construct(string $name, string $color, string $rider, bool $hungry = true, int $eatCount = 0)
    {
        $this->name = $name;
        $this->color = $color;
        $this->rider = $rider;
        $this->hungry = $hungry;
        $this->eatCount = $eatCount;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getRider(): string
    {
        return $this->rider;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function isHungry(): bool
    {
        return $this->hungry;
    }

    public function eat(): bool
    {
        if ($this->eatCount < 2) {
            $this->eatCount += 1;
            return $this->hungry;
        } else {
            $this->hungry = false;
            return $this->hungry;
        }
    }
}

