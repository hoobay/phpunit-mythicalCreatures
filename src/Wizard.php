<?php

declare(strict_types=1);

namespace MythicalCreatures;

class Wizard {
    private string $name;
    private bool $beard;
    private bool $rested = true;
    private int $castCount = 0;

    public function __construct(string $name, array $opt = [])
    {
        $this->name = $name;
        $this->beard = $opt['bearded'] ?? true;
        $this->rested = true;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isBearded(): bool
    {
        return $this->beard;
    }

    public function incantation($str): string 
    {
        return 'sudo ' . $str;
    }

    public function isRested(): bool
    {
        return $this->castCount < 0;
    }

    public function cast(): string
    {
        $this->castCount ++;
        return "MAGIC MISSILE!";
    }
}
