<?php

declare(strict_types=1);

namespace MythicalCreatures\Tests;

use PHPUnit\Framework\TestCase;
use MythicalCreatures\Wizard;

class WizardTest extends TestCase
{
    public function testHasAName(): void
    {
        $wizard = new Wizard('Eric');
        $this->assertEquals('Eric', $wizard->getName());
    }

    public function testHasADifferentName(): void
    {
        $wizard = new Wizard('Alex');
        $this->assertEquals('Alex', $wizard->getName());
    }

    public function testIsBeardedByDefault(): void
    {
        $wizard = new Wizard('Ben');
        $this->assertTrue($wizard->isBearded());
    }

    public function testIsNotAlwaysBearded(): void
    {
        $wizard = new Wizard('Valerie', ['bearded' => false]);
        $this->assertFalse($wizard->isBearded());
    }

    public function testHasRootPowers(): void
    {
        $wizard = new Wizard('Stella', ['bearded' => false]);
        $this->assertEquals('sudo chown ~/bin', $wizard->incantation('chown ~/bin'));
    }

    public function testHasManyRootPowers(): void
    {
        $wizard = new Wizard('Sal');
        $this->assertEquals('sudo rm -rf /home/mirandax', $wizard->incantation('rm -rf /home/mirandax'));
    }

    public function testStartsRested(): void
    {
        # create wizard
        $wizard = new Wizard('Ulriq');
        # .rested? returns true
        $this->assertTrue($wizard->isRested());
    }

    public function testCanCastSpells(): void
    {
        # create wizard
        $wizard = new Wizard('Qadehar');
        # .cast returns "MAGIC MISSILE!"
        $this->assertEquals("MAGIC MISSILE!", $wizard->cast());
    }

    public function testGetsTiredAfterCastingThreeSpells(): void
    {
        # create wizard
        $wizard = new Wizard('Gerald');
        # casts spell twice
        $wizard->cast();
        $wizard->cast();
        # check if wizard is rested
        $this->assertTrue($wizard->isRested());
        # casts spell
        $wizard->cast();
        # check wizard is not rested
        $this->assertFalse($wizard->isRested());
    }
}
