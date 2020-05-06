<?php

namespace Javanile\Hamper\Tests;

use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    public function testInfo()
    {
        $adb = \PearDatabase::getInstance();
        $this->assertEquals("A", "A");
    }
}
