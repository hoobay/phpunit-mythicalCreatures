<?php

declare(strict_types=1);

namespace MythicalCreatures;

class Victim
{
    private string $status;

    public function __construct()
    {
        $this->status = 'alive';
    }

    public function getStatus(): string
    {
        return $this->status;
    }
    
    public function setStatus($status): void
    {
        $this->status = $status;
    }
}
