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
        $werewolf = new Werewolf('hind', 'france');
        $this->assertFalse($werewolf->isHungry());
    }

    public function testBecomesHungryAfterChangingToAWerewolf(): void
    {
        $werewolf = new Werewolf('Wulfric', 'France');
        $werewolf->change();
        $this->assertTrue($werewolf->isHungry());
    }

    public function testConsumesAVictim(): void
    {
        $werewolf = new Werewolf('Remus', 'England');
        $victim = new Victim();
        $werewolf->change();
        $werewolf->consume($victim);
        $this->assertEquals("dead", $victim->getStatus());
    }
    public function testCannotConsumeAVictimIfItIsInHumanForm(): void
    {
        $werewolf = new Werewolf('Romulus', 'England');
        $victim = new Victim();
        $werewolf->consume($victim);
        $this->assertEquals("alive", $victim->getStatus());
    }

    public function testAWerewolfThatHasConsumedAHumanBeingIsNoLongerHungry(): void
    {
        $werewolf = new Werewolf('Fenrir', 'Greece');
        $victim = new Victim();
        $werewolf->change();
        $this->assertTrue($werewolf->isHungry());
        $werewolf->consume($victim);
        $this->assertFalse($werewolf->isHungry());
    }

    public function testAWerewolfWhoHasConsumedAVictimMakesTheVictimDead(): void
    {
        $werewolf = new Werewolf('Lupin', 'France');
        $victim = new Victim();
        $werewolf->change();
        $werewolf->consume($victim);
        $this->assertEquals("dead", $victim->getStatus());
    }
}
