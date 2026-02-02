<?php

declare(strict_types=1);

namespace MythicalCreatures\Tests;

use PHPUnit\Framework\TestCase;
use MythicalCreatures\Vampire;

class VampireTest extends TestCase
{
    public function testHasAName(): void
    {
        $vampire = new Vampire('Dracula');
        $this->assertEquals('Dracula', $vampire->getName());
    }

    public function testItCanBeNamedSomethingElse(): void
    {
        $vampire = new Vampire('Vladimir');
        $this->assertEquals('Vladimir', $vampire->getName());
    }

    public function testKeepsAPetBatByDefault(): void
    {
        $vampire = new Vampire('Ruthven');
        $this->assertEquals('bat', $vampire->getPet());
    }

    public function testCanKeepOtherPets(): void
    {
        $vampire = new Vampire('Varney', 'fox');
        $this->assertEquals('fox', $vampire->getPet());
    }

    public function testIsThirstyByDefault(): void
    {
        $vampire = new Vampire('The Count');
        $this->assertTrue($vampire->isThirsty());
    }

    public function testIsNotThirstyAfterDrinking(): void
    {
        $vampire = new Vampire('Elizabeth Bathory');
        $vampire->drink();
        $this->assertFalse($vampire->isThirsty());
    }
}
