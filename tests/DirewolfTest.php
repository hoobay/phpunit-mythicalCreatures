<?php

declare(strict_types=1);

namespace MythicalCreatures\Tests;

use PHPUnit\Framework\TestCase;
use MythicalCreatures\Direwolf;
use MythicalCreatures\Stark;

class DirewolfTest extends TestCase
{
    public function testHasAName(): void
    {
        $wolf = new Direwolf('Nymeria');
        $this->assertEquals('Nymeria', $wolf->getName());
    }

    public function testCanHaveADifferentNameAndCanHaveAHome(): void
    {
        $wolf = new Direwolf('Lady');
        $this->assertEquals('Beyond the Wall', $wolf->getHome());
        $this->assertEquals('Lady', $wolf->getName());
    }

    public function testIsMassiveByDefault(): void
    {
        $wolf = new Direwolf('Ghost');
        $this->assertEquals('Massive', $wolf->getSize());
        $this->assertEquals('Ghost', $wolf->getName());
    }

    public function testCanHaveAnotherHomeAndBeAnotherSize(): void
    {
        $wolf = new Direwolf('Shaggydog', 'Winterfell', 'Smol Pupper');
        $this->assertEquals('Shaggydog', $wolf->getName());
        $this->assertEquals('Winterfell', $wolf->getHome());
        $this->assertEquals('Smol Pupper', $wolf->getSize());
    }

    public function testTheStarksAreInWinterfellByDefault(): void
    {
        $wolf = new Direwolf('Summer', 'Winterfell');
        $stark = new Stark('Bran');
        $this->assertEquals('Winterfell', $wolf->getHome());
        $this->assertEquals('Winterfell', $stark->getLocation());
    }

    public function testStartsOffWithNoStarksToProtect(): void
    {
        $wolf = new Direwolf('Nymeria');
        $stark = new Stark('Arya');
        $this->assertEmpty($wolf->getStarksToProtect());
    }

    public function testProtectsTheStarkChildren(): void
    {
        $wolf = new Direwolf('Nymeria', 'Riverlands');
        $stark = new Stark('Arya', 'Riverlands');

        $wolf->protects($stark);

        $this->assertEquals('Arya', $wolf->getStarksToProtect()[0]->getName());
    }

    public function testCanOnlyProtectTheStarkChildrenIfTheyAreInTheSameLocation(): void
    {
        $wolf = new Direwolf('Ghost');
        $stark = new Stark('Jon', 'Kings Landing');

        $wolf->protects($stark);

        $this->assertEmpty($wolf->getStarksToProtect());
    }

    public function testCanOnlyProtectTwoStarksAtATime(): void
    {
        $summerWolf = new Direwolf('Summer', 'Winterfell');
        $ladyWolf = new Direwolf('Lady', 'Winterfell');
        $sansaStark = new Stark('Sansa');
        $jonStark = new Stark('Jon');
        $robStark = new Stark('Rob');
        $branStark = new Stark('Bran');
        $aryaStark = new Stark('Arya');

        $summerWolf->protects($sansaStark);
        $summerWolf->protects($jonStark);
        $ladyWolf->protects($robStark);
        $ladyWolf->protects($branStark);
        $ladyWolf->protects($aryaStark);

        $this->assertContains($sansaStark, $summerWolf->getStarksToProtect());
        $this->assertContains($jonStark, $summerWolf->getStarksToProtect());
        $this->assertContains($robStark, $ladyWolf->getStarksToProtect());
        $this->assertContains($branStark, $ladyWolf->getStarksToProtect());
        $this->assertNotContains($aryaStark, $ladyWolf->getStarksToProtect());
    }

    public function testTheStarksAreUnsafeByDefault(): void
    {
        $stark = new Stark('Jon', 'The Wall');
        $this->assertFalse($stark->isSafe());
        $this->assertEquals('Winter is Coming', $stark->getHouseWords());
    }

    public function testProtectsTheStarks(): void
    {
        $wolf = new Direwolf('Nymeria', 'Winterfell');
        $aryaStark = new Stark('Arya');
        $sansaStark = new Stark('Sansa');

        $wolf->protects($aryaStark);

        $this->assertTrue($aryaStark->isSafe());
        $this->assertFalse($sansaStark->isSafe());
    }

    public function testHuntsWhiteWalkers(): void
    {
        $wolf = new Direwolf('Nymeria', 'Winterfell');
        $this->assertTrue($wolf->huntsWhiteWalkers());
    }

    public function testWillNotHuntWhiteWalkersWhenProtectingStarks(): void
    {
        $wolf = new Direwolf('Nymeria', 'Winterfell');
        $aryaStark = new Stark('Arya');

        $wolf->protects($aryaStark);

        $this->assertFalse($wolf->huntsWhiteWalkers());
    }

    public function testCanLeaveAndStopProtectingStarks(): void
    {
        $summerWolf = new Direwolf('Summer', 'Winterfell');
        $ladyWolf = new Direwolf('Lady', 'Winterfell');
        $sansaStark = new Stark('Sansa');
        $aryaStark = new Stark('Arya');

        $summerWolf->protects($aryaStark);
        $ladyWolf->protects($sansaStark);
        $summerWolf->leaves($aryaStark);

        $this->assertEmpty($summerWolf->getStarksToProtect());
        $this->assertEquals('Sansa', $ladyWolf->getStarksToProtect()[0]->getName());
        $this->assertFalse($aryaStark->isSafe());
    }

    public function testReturnsTheStarkObjectWhenItLeaves(): void
    {
        $summerWolf = new Direwolf('Summer', 'Winterfell');
        $ladyWolf = new Direwolf('Lady', 'Winterfell');
        $sansaStark = new Stark('Sansa');
        $aryaStark = new Stark('Arya');
        $rickonStark = new Stark('Rickon');

        $summerWolf->protects($aryaStark);
        $ladyWolf->protects($sansaStark);
        $summerWolf->leaves($aryaStark);

        $expected = $ladyWolf->leaves($rickonStark);

        $this->assertEquals('Rickon', $expected->getName());
    }
}
