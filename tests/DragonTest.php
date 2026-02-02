<?php

declare(strict_types=1);

namespace MythicalCreatures\Tests;

use PHPUnit\Framework\TestCase;
use MythicalCreatures\Dragon;

class DragonTest extends TestCase
{
    public function testHasAName(): void
    {
        $dragon = new Dragon('Ramoth', 'gold', 'Lessa');
        $this->assertEquals('Ramoth', $dragon->getName());
    }

    public function testHasARider(): void
    {
        $dragon = new Dragon('Ramoth', 'gold', 'Lessa');
        $this->assertEquals('Lessa', $dragon->getRider());
    }

    public function testHasAColor(): void
    {
        $dragon = new Dragon('Ramoth', 'gold', 'Lessa');
        $this->assertEquals('gold', $dragon->getColor());
    }

    public function testIsADifferentDragon(): void
    {
        $dragon = new Dragon('Mnementh', 'bronze', 'Flar');
        $this->assertEquals('Mnementh', $dragon->getName());
    }

    public function testHasADifferentRider(): void
    {
        $dragon = new Dragon('Mnementh', 'bronze', 'Flar');
        $this->assertEquals('Flar', $dragon->getRider());
    }

    public function testHasADifferentColor(): void
    {
        $dragon = new Dragon('Mnementh', 'bronze', 'Flar');
        $this->assertEquals('bronze', $dragon->getColor());
    }

    public function testWasBornHungry(): void
    {
        $dragon = new Dragon('Mnementh', 'bronze', 'Flar');
        $this->assertTrue($dragon->isHungry());
    }

    public function testEatsALot(): void
    {
        $dragon = new Dragon('Mnementh', 'bronze', 'Flar');
        $this->assertTrue($dragon->isHungry());
        
        $dragon->eat();
        $this->assertTrue($dragon->isHungry());
        
        $dragon->eat();
        $this->assertTrue($dragon->isHungry());
        
        $dragon->eat();
        $this->assertFalse($dragon->isHungry());
    }
}
