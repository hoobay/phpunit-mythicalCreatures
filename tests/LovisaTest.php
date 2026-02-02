<?php

declare(strict_types=1);

namespace MythicalCreatures\Tests;

use PHPUnit\Framework\TestCase;
use MythicalCreatures\Lovisa;

class LovisaTest extends TestCase
{
    public function testSheHasATitle(): void
    {
        $lovisa = new Lovisa('Lovisa the Swedish Goddess');
        $this->assertEquals('Lovisa the Swedish Goddess', $lovisa->getTitle());
    }

    public function testSheIsBrilliantByDefault(): void
    {
        $lovisa = new Lovisa('Lovisa the Mentor');
        $this->assertEquals(['brilliant'], $lovisa->getCharacteristics());
        $this->assertTrue($lovisa->isBrilliant());
    }

    public function testSheIsMoreThanBrilliant(): void
    {
        $lovisa = new Lovisa('Lovisa the friend', ['brilliant', 'kind']);
        $this->assertEquals(['brilliant', 'kind'], $lovisa->getCharacteristics());
        $this->assertTrue($lovisa->isBrilliant());
        $this->assertTrue($lovisa->isKind());
    }

    public function testSheSaysSparklyStuff(): void
    {
        $lovisa = new Lovisa('Lovisa the Loved');
        $this->assertEquals('**;* Wonderful! **;*', $lovisa->say('Wonderful!'));
        $this->assertEquals('**;* You are doing great! **;*', $lovisa->say('You are doing great!'));
    }
}
