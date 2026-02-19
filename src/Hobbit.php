<?php

declare(strict_types=1);

namespace MythicalCreatures;

class Hobbit {
    private string $name;
    private string $disposition;
    private int $age;

    public function __construct(string $name, string $disposition = 'homebody')
    {
        $this->name = $name;
        $this->disposition = $disposition;
        $this->age = 0;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDisposition(): string
    {
        return $this->disposition;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function celebrateBirthday(): int
    {
        $this->age++;
        return $this->age;
    }

    public function isAdult(): bool
    {
        return $this->age >= 33;
    }

    public function isOld(): bool
    {
        return $this->age >= 101;
    }

    public function hasRing(): bool
    {
        return $this->name === 'Frodo';
    }

    public function isShort(): bool
    {
        return true;
    }
}

