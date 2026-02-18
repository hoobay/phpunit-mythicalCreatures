<?php

declare(strict_types=1);

namespace MythicalCreatures;

class Unicorn
{
    private string $name;
    private string $color;

    public function __construct(string $name, string $color = 'silver')
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function isSilver(): bool
    {
        return $this->color === 'silver';
    }

    public function say(string $message): string
    {
        return "**;* {$message} **;*";
    }
}
