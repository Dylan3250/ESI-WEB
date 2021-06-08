<?php

use PHPUnit\Framework\TestCase;

final class MyClassTest extends TestCase {
    // issu de la documentation de phpunit
    public function testPushAndPop() {
        $stack = [];
        $this->assertSame(0, count($stack));

        array_push($stack, 'foo');
        $this->assertSame('foo', $stack[count($stack) - 1]);
        $this->assertSame(1, count($stack));
    }
}
