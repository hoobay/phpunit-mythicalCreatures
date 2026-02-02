<?php

declare(strict_types=1);

namespace MythicalCreatures\Tests;

use PHPUnit\Framework\TestCase;
use MythicalCreatures\Unicorn;

class UnicornTest extends TestCase
{
    public function testHasAName(): void
    {
        $unicorn = new Unicorn('Robert');
        $this->assertEquals('Robert', $unicorn->getName());
    }

    public function testIsSilverByDefault(): void
    {
        $unicorn = new Unicorn('Margaret');
        $this->assertEquals('silver', $unicorn->getColor());
        $this->assertTrue($unicorn->isSilver());
    }

    public function testDoesntHaveToBeSilver(): void
    {
        $unicorn = new Unicorn('Barbara', 'purple');
        $this->assertEquals('purple', $unicorn->getColor());
        $this->assertFalse($unicorn->isSilver());
    }

    public function testSaysSparklyStuff(): void
    {
        $unicorn = new Unicorn('Johnny');
        $this->assertEquals('**;* Wonderful! **;*', $unicorn->say('Wonderful!'));
        $this->assertEquals('**;* I dont like you very much. **;*', $unicorn->say('I dont like you very much.'));
    }
}
