<?php

declare(strict_types=1);

namespace MythicalCreatures\Tests;

use PHPUnit\Framework\TestCase;
use MythicalCreatures\Werewolf;
use MythicalCreatures\Victim;

class WerewolfTest extends TestCase
{
    public function testHasAName(): void
    {
        $werewolf = new Werewolf('David');
        $this->assertEquals('David', $werewolf->getName());
    }

    public function testHasALocation(): void
    {
        $werewolf = new Werewolf('David', 'London');
        $this->assertEquals('London', $werewolf->getLocation());
    }

    public function testIsByDefaultHuman(): void
    {
        $werewolf = new Werewolf('David', 'London');
        $this->assertTrue($werewolf->isHuman());
    }

    public function testWhenStartingAsAHumanChangingMakesItTurnIntoAWerewolf(): void
    {
        $werewolf = new Werewolf('David', 'London');
        $werewolf->change();
        $this->assertTrue($werewolf->isWolf());
        $this->assertFalse($werewolf->isHuman());
    }

    public function testWhenStartingAsAHumanChangingAgainMakesItBeHumanAgain(): void
    {
        $werewolf = new Werewolf('David', 'London');
        $this->assertTrue($werewolf->isHuman());

        $werewolf->change();
        $this->assertFalse($werewolf->isHuman());

        $werewolf->change();
        $this->assertTrue($werewolf->isHuman());
    }

    public function testWhenStartingAsAWerewolfChangingASecondTimeMakesItAWerewolf(): void
    {
        $werewolf = new Werewolf('David', 'London');

        $werewolf->change();
        $this->assertTrue($werewolf->isWolf());

        $werewolf->change();
        $werewolf->change();

        $this->assertTrue($werewolf->isWolf());
    }

    public function testIsNotHungryByDefault(): void
    {
        
    }

    public function testBecomesHungryAfterChangingToAWerewolf(): void
    {
       
    }

    public function testConsumesAVictim(): void
    {
       
    }

    public function testCannotConsumeAVictimIfItIsInHumanForm(): void
    {
       
    }

    public function testAWerewolfThatHasConsumedAHumanBeingIsNoLongerHungry(): void
    {
        
    }

    public function testAWerewolfWhoHasConsumedAVictimMakesTheVictimDead(): void
    {
       
    }
}
