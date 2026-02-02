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
        $medusa = new Medusa('Cassiopeia');
        $victim1 = new Person('Perseus');
        $victim2 = new Person('Hercules');
        $victim3 = new Person('Apollo');

        $medusa->stare($victim1);
        $medusa->stare($victim2);
        $medusa->stare($victim3);

        $this->assertCount(3, $medusa->getStatues());
    }

    public function testIfAFourthVictimIsStonedTheFirstIsUnstoned(): void
    {
        $medusa = new Medusa('Cassiopeia');
        $victim1 = new Person('Perseus');
        $victim2 = new Person('Hercules');
        $victim3 = new Person('Apollo');
        $victim4 = new Person('Zeus');

        $medusa->stare($victim1);
        $medusa->stare($victim2);
        $medusa->stare($victim3);
        
        $this->assertTrue($victim1->isStoned());
        
        $medusa->stare($victim4);
        
        $this->assertFalse($victim1->isStoned());
        $this->assertTrue($victim2->isStoned());
        $this->assertTrue($victim3->isStoned());
        $this->assertTrue($victim4->isStoned());
        $this->assertCount(3, $medusa->getStatues());
    }
}
