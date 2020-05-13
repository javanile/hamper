<?php

namespace Javanile\Hamper\Tests;

use Javanile\Hamper\Hamper;
use Javanile\Hamper\HamperException;
use PHPUnit\Framework\TestCase;

class HamperDatabaseTest extends TestCase
{
    // public function testQuery(){}

    public function testFetch()
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

        $this->assertEquals($key, $row['field2']);
    }
    public function testFetchAll()
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
            $row = $hdb->fetchAll($sql, [$key], ['dieOnError' => true]);
        } catch (HamperException $exception) {
            var_dump($exception->getMessage());
            exit(1);
        }

        $this->assertEquals($key, $row[0]['field2']);
    }
    /*
    public function testInsert()
    {
        $hdb = Hamper::getInstance();
        $key1 = md5(time().rand());
        $key2 = md5(time().rand());

        $sql = "DROP TABLE IF EXISTS test";
        $res = $hdb->query($sql, []);

        $sql = "CREATE TABLE IF NOT EXISTS test (field_1 TEXT, field_2 TEXT) ENGINE=INNODB";
        $res = $hdb->query($sql, []);

        $data = [
                'field_1' => $key1,
                'field_2' => $key2,
                ];

        $keys = array_keys($data);
        $values = array_values($data);
        $row = $hdb->insert("test", $data, ['dieOnError' => true]);
        var_dump($row);

        $sql = "SELECT * FROM test WHERE field1 = ?";
        $res = $hdb->query($sql, [$key1]);

        $this->assertEquals($key1, $row[0]['field1']);

    }
    */
    public function testUpdate()
    {
        $hdb = Hamper::getInstance();
        $key1 = md5(time().rand());
        $key2 = md5(time().rand());
        $key3 = md5(time().rand());
        $key4 = md5(time().rand());

        $sql = "DROP TABLE IF EXISTS test";
        $res = $hdb->query($sql, []);

        $sql = "CREATE TABLE IF NOT EXISTS test (field_1 TEXT, field_2 TEXT) ENGINE=INNODB";
        $res = $hdb->query($sql, []);

        $sql = "INSERT INTO test (field1, field2) VALUES (?, ?)";
        $res = $hdb->query($sql, [$key1, $key2]);

        $sql = "INSERT INTO test (field1, field2) VALUES (?, ?)";
        $res = $hdb->query($sql, [md5(time().rand()), md5(time().rand())]);


        $recordToChange = [
            'field_1' => $key1,
            'field_2' => $key2,
        ];


        $data = [
                'field_1' => $key3,
                'field_2' => $key4,
                ];

        $row = $hdb->update("test", $recordToChange, $data, ['dieOnError' => true]);
        var_dump($row);

        $this->assertEquals($key3, $row[0]['field1']);

    }

    // public function testDelete(){}
}
