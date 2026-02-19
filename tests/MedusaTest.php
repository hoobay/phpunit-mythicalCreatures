<?php

declare(strict_types=1);

namespace MythicalCreatures\Tests;

use PHPUnit\Framework\TestCase;
use MythicalCreatures\Medusa;
use MythicalCreatures\Person;

class MedusaTest extends TestCase
{
    public function testHasAName(): void
    {
        $medusa = new Medusa('Cassiopeia');
        $this->assertEquals('Cassiopeia', $medusa->getName());
    }

    public function testHasNoStatuesWhenCreated(): void
    {
        $medusa = new Medusa('Cassiopeia');
        $this->assertEmpty($medusa->getStatues());
    }

    public function testGainsAStatueWhenStaringAtAPerson(): void
    {
        $medusa = new Medusa('Cassiopeia');
        $victim = new Person('Perseus');

        $medusa->stare($victim);
        
        $this->assertCount(1, $medusa->getStatues());
        $this->assertEquals('Perseus', $medusa->getStatues()[0]->getName());
        $this->assertInstanceOf(Person::class, $medusa->getStatues()[0]);
    }

    public function testTurnsAPersonToStoneWhenStaringAtThem(): void
    {
        $medusa = new Medusa('Cassiopeia');
        $victim = new Person('Perseus');

        $this->assertFalse($victim->isStoned());
        $medusa->stare($victim);
        $this->assertTrue($victim->isStoned());
    }

    public function testCanOnlyHaveThreeVictims(): void
    {
        $medusa = new Medusa('Viola');
        $victim = new Person('Ulysse');
        $victim2 = new Person('Thesee');
        $victim3 = new Person('Hermes');
        $medusa->stare($victim);
        $medusa->stare($victim2);
        $medusa->stare($victim3);    

        $this->assertCount(3, $medusa->getStatues());
    }

    public function testIfAFourthVictimIsStonedTheFirstIsUnstoned(): void
    {
        $medusa = new Medusa('Viola');
        $victim = new Person('Ulysse');
        $victim2 = new Person('Thesee');
        $victim3 = new Person('Hermes');
        $victim4 = new Person('Romulus');

        $medusa->stare($victim);
        $medusa->stare($victim2);
        $medusa->stare($victim3);

        $this->assertTrue($victim->isStoned());

        $medusa->stare($victim4); 
        
        $this->assertFalse($victim->isStoned());

        $this->assertCount(3, $medusa->getStatues());
    }
}
