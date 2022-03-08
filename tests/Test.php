<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
class Test extends TestCase
{
    public function testPop(): void
    {
        $stack = array('foo');
        $this->assertSame('foo', array_pop($stack));
        $this->assertEmpty($stack);
    }
}
