<?php

namespace Javanile\Hamper\Tests;

use Javanile\Hamper\Hamper;
use PHPUnit\Framework\TestCase;

class HamperDatabaseTest extends TestCase
{
    public function testQuery()
    {
        $hdb = Hamper::getInstance();

        $sql = "CREATE TABLE IF NOT EXISTS test (test TEXT) ENGINE=INNODB";

        $res = $hdb->query($sql);


        /*
        $rows = Hamper::fetchAll($sql);
        var_dump($rows);

        $adb = Hamper::getDatabase();

        $hdb->insert('vtiger_table_name', [
            'field1' => 'value1',
        ]);



        $hdb->fecth("SQL asdasd");

        $this->assertEquals("A", "A");
        */
        $this->assertEquals("A", "A");
    }
}
