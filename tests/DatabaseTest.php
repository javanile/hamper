<?php

namespace Javanile\Hamper\Tests;

use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    public function testInfo()
    {
        $hdb = Hamper::getInstance();

        $hdb->fecth("SQL asdasd");

        $this->assertEquals("A", "A");
    }
}
