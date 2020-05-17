<?php

namespace Javanile\Hamper\Tests;

use Javanile\Hamper\Hamper;
use Javanile\Hamper\HamperException;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected $hdb;

    protected function setUp()
    {
        $this->hdb = Hamper::getInstance();
        try {
            $this->hdb->query("DROP TABLE IF EXISTS test");
        } catch (HamperException $e) {
            die($e->getMessage());
        }
    }
}
