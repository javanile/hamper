<?php

namespace Javanile\Hamper;

class HamperDatabaseTables extends PearDatabaseDecorator
{
    /**
     * Create new table.
     *
     * @param $table
     * @param $fields
     *
     * @usage query($sql, $params = [], $options = [])
     */
    public function create($table, $fields)
    {
        $this->pearDatabase->createTable($table, $fields);
    }
}
