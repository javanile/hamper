<?php

namespace Javanile\Hamper;

use Javanile\Hamper\PearDatabaseDecorator;

class HamperDatabase extends PearDatabaseDecorator
{
    /**
     *
     */
    public $tables;

    /**
     * HamperDatabase constructor.
     * @param $pearDatabase
     */
    public function __construct($pearDatabase)
    {
        parent::__construct($pearDatabase);

        $this->tables = new HamperDatabaseTables($pearDatabase);
    }

    /**
     * Execute query.
     *
     * @usage $hdb->query($sql, $values)
     *
     * @param $sql
     * @param array $params
     * @param array $options
     *
     * @example asd
     *          dsa
     *          asd
     *          dsa
     */
    public function query($sql, $params = [], $options = [])
    {
        $handler = OptionsHandlerFactory::createInstance($options);
        return $this->pearDatabase->pquery($sql, $params, $handler->dieOnError, $handler->message);
    }

    /**
     * Fetch one record.
     */
    public function fetch($sql)
    {
        $this->pearDatabase->getOne($sql);
    }

    /**
     * Fetch record list.
     */
    public function fetchAll($sql)
    {

    }

    /**
     * Insert one record.
     */
    public function insert($table, $data)
    {

    }

    /**
     * Update one record.
     */
    public function update($table, $data)
    {

    }

    /**
     * Delete one record.
     */
    public function delete($table, $data)
    {

    }
}
