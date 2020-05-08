<?php

namespace Javanile\Hamper;

class HamperDatabaseTables extends PearDatabaseDecorator
{
    /**
     * @param $table
     * @param $fields
     */
    public function create($table, $fields)
    {
        $this->pearDatabase->createTable($table, $fields);
    }
}
