<?php

declare(strict_types=1);

namespace MythicalCreatures\Tests;

use PHPUnit\Framework\TestCase;
use MythicalCreatures\Hobbit;

class HobbitTest extends TestCase
{
    public function testHasAName(): void
    {
        $hobbit = new Hobbit('Bilbo');
        $this->assertEquals('Bilbo', $hobbit->getName());
    }

    public function testCanHaveAnotherName(): void
    {
        $hobbit = new Hobbit('Peregrin');
        $this->assertEquals('Peregrin', $hobbit->getName());
    }

    public function testHasAnUnadventurousDisposition(): void
    {
        $hobbit = new Hobbit('Samwise');
        $this->assertEquals('homebody', $hobbit->getDisposition());
    }

    public function testCanHaveADifferentDisposition(): void
    {
        $hobbit = new Hobbit('Frodo', 'adventurous');
        $this->assertEquals('adventurous', $hobbit->getDisposition());
    }

    public function testCanGrowOlderWhenCelebratingBirthdays(): void
    {
        $hobbit = new Hobbit('Meriadoc');
        $this->assertEquals(0, $hobbit->getAge());

        for ($i = 0; $i < 5; $i++) {
            $hobbit->celebrateBirthday();
        }

        $this->assertEquals(5, $hobbit->getAge());
    }

    public function testIsConsideredAChildAt32(): void
    {
        $hobbit = new Hobbit('Gerontius');

        for ($i = 0; $i < 32; $i++) {
            $hobbit->celebrateBirthday();
        }

        $this->assertFalse($hobbit->isAdult());
    }

    public function testComesOfAgeAt33(): void
    {
        $hobbit = new Hobbit('Otho');

        for ($i = 0; $i < 33; $i++) {
            $hobbit->celebrateBirthday();
        }

        $this->assertTrue($hobbit->isAdult());

        // still an adult one year later
        $hobbit->celebrateBirthday();

        $this->assertTrue($hobbit->isAdult());
    }

    public function testIsOldAtTheAgeOf101(): void
    {
        $hobbit = new Hobbit('Bilbo');

        for ($i = 0; $i < 101; $i++) {
            $hobbit->celebrateBirthday();
        }

        $this->assertTrue($hobbit->isOld());
    }

    public function testHasTheRingIfItsNameIsFrodo(): void
    {
        $frodo = new Hobbit('Frodo');
        $sam = new Hobbit('Sam');

        $this->assertTrue($frodo->hasRing());
        $this->assertFalse($sam->hasRing());
    }

    public function testTheyAreShort(): void
    {
        $hobbit = new Hobbit('Pippin');
        $this->assertTrue($hobbit->isShort());
    }
}
