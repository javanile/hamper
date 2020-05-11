<?php

namespace Javanile\Hamper\Tests;

use Javanile\Hamper\Hamper;
use Javanile\Hamper\HamperException;
use PHPUnit\Framework\TestCase;

class HamperDatabaseTest extends TestCase
{
    public function testQuery()
    {
        $hdb = Hamper::getInstance();
        $key = md5(time().rand());

        try {
            $sql = "DROP TABLE IF EXISTS test";
            $res = $hdb->query($sql, []);

            $sql = "CREATE TABLE IF NOT EXISTS test (field1 TEXT, field2 TEXT) ENGINE=INNODB";
            $res = $hdb->query($sql, []);

            $sql = "INSERT INTO test (field1, field2) VALUES (?, ?)";
            $res = $hdb->query($sql, [$key, $key]);

            $sql = "SELECT * FROM test WHERE field1 = ?";
            $row = $hdb->fetch($sql, [$key], ['dieOnError' => true]);
        } catch (HamperException $exception) {
            var_dump($exception->getMessage());
            exit(1);
        }

        var_dump($row);

        $this->assertEquals($key, $row['field2']);
    }
}
