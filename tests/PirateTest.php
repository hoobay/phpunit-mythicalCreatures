<?php

declare(strict_types=1);

namespace MythicalCreatures\Tests;

use PHPUnit\Framework\TestCase;
use MythicalCreatures\Pirate;

class PirateTest extends TestCase
{
    public function testHasAName(): void
    {
        $pirate = new Pirate('Jane');
        $this->assertEquals('Jane', $pirate->getName());
    }

    public function testCanHaveADifferentName(): void
    {
        $pirate = new Pirate('Blackbeard');
        $this->assertEquals('Blackbeard', $pirate->getName());
    }

    public function testIsAScallywagByDefault(): void
    {
        $pirate = new Pirate('Jane');
        $this->assertEquals('Scallywag', $pirate->getJob());
    }

    public function testIsNotAlwaysAScallywag(): void
    {
        $pirate = new Pirate('Jack', 'cook');
        $this->assertEquals('cook', $pirate->getJob());
    }

    public function testIsNotCursedByDefault(): void
    {
        $pirate = new Pirate('Jack');

        $this->assertFalse($pirate->isCursed());

        $pirate->commitHeinousAct();
        $this->assertFalse($pirate->isCursed());

        $pirate->commitHeinousAct();
        $this->assertFalse($pirate->isCursed());

        $pirate->commitHeinousAct();
        $this->assertTrue($pirate->isCursed());
    }

    public function testHasABooty(): void
    {
        $pirate = new Pirate('Jack');
        $this->assertEquals(0, $pirate->getBooty());
    }

    public function testGets100BootyForRobbingAShip(): void
    {
        $pirate = new Pirate('Jack');
        
        $pirate->robShip();
        $this->assertEquals(100, $pirate->getBooty());
        
        $pirate->robShip();
        $this->assertEquals(200, $pirate->getBooty());
    }
}
