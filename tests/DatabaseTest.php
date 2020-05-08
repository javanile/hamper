<?php

namespace Javanile\Hamper\Tests;

use Javanile\Hamper\Hamper;
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    public function testInfo()
    {
        $hdb = Hamper::getInstance();







        $row = Hamper::fetch($sql);


        var_dump($row);

        $rows = Hamper::fetchAll($sql);
        var_dump($rows);

        $adb = Hamper::getDatabase();

        $hdb->insert('vtiger_table_name', [
            'field1' => 'value1',
        ]);



        $hdb->fecth("SQL asdasd");

        $this->assertEquals("A", "A");
    }
}
