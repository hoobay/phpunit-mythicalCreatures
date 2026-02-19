<?php

declare(strict_types=1);

namespace MythicalCreatures;

class Medusa {
    private string $name;
    private array $statues = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getStatues(): array
    {
        return $this->statues;
    }

    public function stare(Person $person): void
    {
        $person->setStoned(true);
        array_push($this->statues, $person);
        if (sizeof($this->statues) > 3) {
            $temp = array_shift($this->statues);
            $temp->setStoned(false);
        }
 
    }
}