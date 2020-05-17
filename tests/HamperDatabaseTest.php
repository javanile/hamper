<?php

namespace Javanile\Hamper\Tests;

use Javanile\Hamper\HamperException;

class HamperDatabaseTest extends TestCase
{
    public function testQuery()
    {
        $sql = "CREATE TABLE IF NOT EXISTS test (field1 TEXT, field2 TEXT)";

        try {
            $res = $this->hdb->query($sql);
            $this->assertTrue(is_object($res));
            $res = $this->hdb->query($sql);
            $this->assertTrue(is_object($res));
        } catch (HamperException $e) {
            die($e->getMessage());
        }
    }

    public function testQueryFail()
    {
        $this->expectException(HamperException::class);
        $this->hdb->query("POINTLESS BROKEN QUERY");
    }

    public function testFetch()
    {
        $key = md5(time().rand());

        try {
            $this->hdb->query("CREATE TABLE IF NOT EXISTS test (field1 TEXT, field2 TEXT)");
            $this->hdb->query("INSERT INTO test (field1, field2) VALUES (?, ?)", [$key, $key]);
            $row = $this->hdb->fetch("SELECT * FROM test WHERE field1 = ?", [$key]);
            $this->assertEquals($key, $row['field2']);
        } catch (HamperException $e) {
            die($e->getMessage());
        }
    }

    public function testFetchFail()
    {
        $this->expectException(HamperException::class);
        $this->hdb->fetch("POINTLESS BROKEN QUERY");
    }

    public function testFetchAll()
    {
        $key = md5(time().rand());

        try {
            $this->hdb->query("CREATE TABLE IF NOT EXISTS test (field1 TEXT, field2 TEXT)");
            $this->hdb->query("INSERT INTO test (field1, field2) VALUES (?, ?)", [$key, $key]);
            $this->hdb->query("INSERT INTO test (field1, field2) VALUES (?, ?)", [$key, $key]);
            $rows = $this->hdb->fetchAll("SELECT * FROM test WHERE field1 = ?", [$key]);
            $this->assertEquals($key, $rows[0]['field2']);
            $this->assertEquals($key, $rows[1]['field2']);
        } catch (HamperException $e) {
            die($e->getMessage());
        }
    }

    public function testFetchAllFail()
    {
        $this->expectException(HamperException::class);
        $this->hdb->fetchAll("POINTLESS BROKEN QUERY");
    }

    public function testInsert()
    {
        $data = [
            'field1' => md5(time().rand()),
            'field2' => md5(time().rand()),
        ];

        try {
            $this->hdb->query("CREATE TABLE IF NOT EXISTS test (field1 TEXT, field2 TEXT)");
            $res = $this->hdb->insert("test", $data);
            $this->assertTrue(is_object($res));
            $row = $this->hdb->fetch("SELECT * FROM test WHERE field1 = ?", [$data['field1']]);
            $this->assertEquals($data['field2'], $row['field2']);
        } catch (HamperException $e) {
            die($e->getMessage());
        }
    }

    public function testInsertFail()
    {
        $this->expectException(HamperException::class);
        $this->hdb->insert("POINTLESS BROKEN QUERY", []);
    }

    public function testLastInsertId()
    {
        try {
            $this->hdb->query("CREATE TABLE IF NOT EXISTS test (field1 INT AUTO_INCREMENT PRIMARY KEY, field2 TEXT)");
            $this->hdb->insert("test", ['field2' => 'value2']);
            $lastInsertId = $this->hdb->lastInsertId();
            $this->assertEquals(1, $lastInsertId);
        } catch (HamperException $e) {
            die($e->getMessage());
        }
    }

    public function testUpdate()
    {
        $data1 = [
            'field1' => md5(time().rand()),
            'field2' => md5(time().rand()),
        ];

        $data2 = [
            'field1' => $data1['field1'],
            'field2' => md5(time().rand()),
        ];

        try {
            $this->hdb->query("CREATE TABLE IF NOT EXISTS test (field1 TEXT, field2 TEXT)");
            $this->hdb->insert("test", $data1);
            $row = $this->hdb->fetch("SELECT * FROM test WHERE field1 = ?", [$data1['field1']]);
            $this->assertEquals($data1['field2'], $row['field2']);
            $res = $this->hdb->update("test", "field1", $data2);
            $this->assertTrue(is_object($res));
            $row = $this->hdb->fetch("SELECT * FROM test WHERE field1 = ?", [$data1['field1']]);
            $this->assertEquals($data2['field2'], $row['field2']);
        } catch (HamperException $e) {
            die($e->getMessage());
        }
    }

    public function testUpdateFail()
    {
        $this->expectException(HamperException::class);
        $this->hdb->update("test", 'invalid key', ['field1' => 'value1', 'field2' => 'value2']);

        $this->expectException(HamperException::class);
        $this->hdb->update("test", 'field1', []);

        $this->expectException(HamperException::class);
        $this->hdb->update("unknown table", 'field1', ['field1' => 'value1', 'field2' => 'value2']);
    }

    public function testDelete()
    {
        $data = [
            'field1' => md5(time().rand()),
            'field2' => md5(time().rand()),
        ];

        try {
            $this->hdb->query("CREATE TABLE IF NOT EXISTS test (field1 TEXT, field2 TEXT) ");
            $this->hdb->insert('test', $data);
            $res = $this->hdb->delete('test', 'field1', $data['field1']);
            $this->assertTrue(is_object($res));
            $row = $this->hdb->fetch("SELECT * FROM test WHERE field1 = ?", [$data['field1']]);
            $this->assertFalse($row);
        } catch (HamperException $e) {
            die($e->getMessage());
        }
    }

    public function testDeleteFail()
    {
        $this->expectException(HamperException::class);
        $this->hdb->delete('', '', '');
    }
}
