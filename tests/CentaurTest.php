<?php

declare(strict_types=1);

namespace MythicalCreatures\Tests;

use PHPUnit\Framework\TestCase;
use MythicalCreatures\Centaur;

class CentaurTest extends TestCase
{
    public function testHasAName(): void
    {
        $centaur = new Centaur('George', 'Palomino');
        $this->assertEquals('George', $centaur->getName());
    }

    public function testHasAHorseBreed(): void
    {
        $centaur = new Centaur('George', 'Palomino');
        $this->assertEquals('Palomino', $centaur->getBreed());
    }

    public function testHasExcellentBowSkills(): void
    {
        $centaur = new Centaur('George', 'Palomino');
        $this->assertEquals('Twang!!!', $centaur->shoot());
    }

    public function testMakesAHorseSoundWhenItRuns(): void
    {
        $centaur = new Centaur('George', 'Palomino');
        $this->assertEquals('Clop clop clop clop!', $centaur->run());
    }

    public function testWhenFirstCreatedItIsNotCranky(): void
    {
        $centaur = new Centaur('George', 'Palomino');
        $this->assertFalse($centaur->isCranky());
    }

    public function testWhenFirstCreatedItIsStandingUp(): void
    {
        $centaur = new Centaur('George', 'Palomino');
        $this->assertTrue($centaur->isStanding());
    }

    public function testGetsTiredAfterRunningOrShootingABowThrice(): void
    {
        $centaur = new Centaur('George', 'Palomino');
        $this->assertFalse($centaur->isCranky());

        $centaur->run();
        $centaur->shoot();
        $centaur->run();

        $this->assertTrue($centaur->isCranky());
    }

    public function testWillNotShootABowWhenCranky(): void
    {
        $centaur = new Centaur('George', 'Palomino');

        $this->assertFalse($centaur->isCranky());

        $centaur->shoot();
        $centaur->shoot();
        $centaur->shoot();

        $this->assertEquals('NO!', $centaur->shoot());
    }

    public function testWillNotSleepWhenItIsStanding(): void
    {
        $centaur = new Centaur('George', 'Palomino');
        $this->assertEquals('NO!', $centaur->sleep());
    }

    public function testIsNotStandingAfterLayingDown(): void
    {
        $centaur = new Centaur('George', 'Palomino');
        $centaur->layDown();

        $this->assertFalse($centaur->isStanding());
        $this->assertTrue($centaur->isLaying());
    }

    public function testCanSleepWhenLayingDown(): void
    {
        $centaur = new Centaur('George', 'Palomino');
        $centaur->layDown();
        $this->assertNotEquals('NO!', $centaur->sleep());
    }

    public function testCannotShootABowWhenLayingDown(): void
    {
        $centaur = new Centaur('George', 'Palomino');
        $centaur->layDown();
        $this->assertEquals('NO!', $centaur->shoot());
    }

    public function testCannotRunWhileLayingDown(): void
    {
        $centaur = new Centaur('George', 'Palomino');
        $centaur->layDown();
        $this->assertEquals('NO!', $centaur->run());
    }

    public function testCanStandUp(): void
    {
        $centaur = new Centaur('George', 'Palomino');
        $centaur->layDown();
        $centaur->standUp();
        $this->assertTrue($centaur->isStanding());
    }

    public function testIsNoLongerCrankyAfterSleeping(): void
    {
        $centaur = new Centaur('George', 'Palomino');

        $centaur->shoot();
        $centaur->run();
        $centaur->shoot();

        $this->assertTrue($centaur->isCranky());

        $centaur->layDown();
        $centaur->sleep();

        $this->assertFalse($centaur->isCranky());

        $centaur->standUp();

        $this->assertEquals('Twang!!!', $centaur->shoot());
        $this->assertEquals('Clop clop clop clop!', $centaur->run());
    }

    public function testBecomesRestedAfterDrinkingAPotion(): void
    {
        $centaur = new Centaur('George', 'Palomino');
        
        $centaur->shoot();
        $centaur->run();
        $centaur->shoot();
        $this->assertTrue($centaur->isCranky());
        
        $centaur->drinkPotion();
        $this->assertFalse($centaur->isCranky());
    }

    public function testCanOnlyDrinkAPotionWhilstStanding(): void
    {
        $centaur = new Centaur('George', 'Palomino');
        $centaur->layDown();
        $this->assertEquals('NO!', $centaur->drinkPotion());
    }

    public function testGetsSickIfAPotionIsDrunkWhileRested(): void
    {
        $centaur = new Centaur('George', 'Palomino');
        $this->assertFalse($centaur->isCranky());
        
        $centaur->drinkPotion();
        $this->assertTrue($centaur->isSick());
    }
}
