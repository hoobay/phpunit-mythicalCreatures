<?php

declare(strict_types=1);

namespace MythicalCreatures\Tests;

use PHPUnit\Framework\TestCase;
use MythicalCreatures\Ogre;
use MythicalCreatures\Human;

class OgreTest extends TestCase
{
    public function testHasAName(): void
    {
        $ogre = new Ogre('Brak');
        $this->assertEquals('Brak', $ogre->getName());
    }

    public function testLivesSomewhereByDefault(): void
    {
        $ogre = new Ogre('Brak');
        $this->assertEquals('Swamp', $ogre->getHome());
    }

    public function testDoesntHaveToLiveInASwamp(): void
    {
        $ogre = new Ogre('Brak', 'Castle');
        $this->assertEquals('Castle', $ogre->getHome());
    }

    public function testCanMeetHumans(): void
    {
        $ogre = new Ogre('Brak');
        $human = new Human();
        $this->assertEquals('Jane', $human->getName());

        $ogre->encounter($human);

        $this->assertEquals(1, $human->getEncounterCounter());
    }

    public function testIsNoticedByHumansEveryThirdEncounter(): void
    {
        $ogre = new Ogre('Brak');
        $human = new Human();

        $ogre->encounter($human);
        $ogre->encounter($human);
        $this->assertFalse($human->noticesOgre());

        $ogre->encounter($human);

        $this->assertTrue($human->noticesOgre());
    }

    public function testIsNoticedByHumansTheSixthTime(): void
    {
        $ogre = new Ogre('Brak');
        $human = new Human();

        for ($i = 0; $i < 6; $i++) {
            $ogre->encounter($human);
        }

        $this->assertTrue($human->noticesOgre());
    }

    public function testCanSwingAClub(): void
    {
        $ogre = new Ogre('Brak');
        $human = new Human();

        $ogre->swingAt($human);

        $this->assertEquals(1, $ogre->getSwings());
    }

    public function testSwingsItsClubWhenNoticedByAHuman(): void
    {
        $ogre = new Ogre('Brak');
        $human = new Human();
        $ogre->encounter($human);

        $this->assertEquals(0, $ogre->getSwings());

        $ogre->encounter($human);
        $ogre->encounter($human);

        $this->assertEquals(1, $ogre->getSwings());
        $this->assertTrue($human->noticesOgre());
    }

    public function testHitsTheHumanEverySecondTimeItSwings(): void
    {
        $ogre = new Ogre('Brak');
        $human = new Human();

        for ($i = 0; $i < 6; $i++) {
            $ogre->encounter($human);
        }

        $this->assertEquals(6, $human->getEncounterCounter());
        $this->assertEquals(2, $ogre->getSwings());
        $this->assertTrue($human->isKnockedOut());
    }

    public function testApologizesAndTheHumanWakesUp(): void
    {
        $ogre = new Ogre('Brak');
        $human = new Human();

        for ($i = 0; $i < 6; $i++) {
            $ogre->encounter($human);
        }

        $this->assertTrue($human->isKnockedOut());

        $ogre->apologize($human);
        $this->assertFalse($human->isKnockedOut());
    }
}
