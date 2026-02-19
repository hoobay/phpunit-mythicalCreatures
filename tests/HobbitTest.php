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
        # create a hobbit
        $hobbit = new Hobbit('Otto');
        # have hobbit age 101 years
        for ($i = 0; $i < 101; $i++) {
            $hobbit->celebrateBirthday();
        }        
        # check that hobbit.old? returns true
        $this->assertTrue($hobbit->isOld());
    }

    public function testHasTheRingIfItsNameIsFrodo(): void
    {
        # create a hobbit named Frodo
        $hobbit = new Hobbit('Frodo');
        # create a second hobbit named Sam
        $hobbit2 = new Hobbit('Sam');
        # check that .has_ring? for Frodo returns true
        $this->assertTrue($hobbit->hasRing());
        # check that .has_ring? for Sam returns false
        $this->assertFalse($hobbit2->hasRing());
    }

    public function testTheyAreShort(): void
    {
        # create a hobbit
        $hobbit = new Hobbit('Todd');
        # check that is_short? returns true
        $this->assertTrue($hobbit->isShort());
    }
}
