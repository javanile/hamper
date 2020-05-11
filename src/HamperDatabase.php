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
     * @throws HamperException
     * @example $hdb->asdasdas
     *          asdasd
     *              asd
     *              asdasd
     *          asdasd
     *          dsa
     */
    public function query($sql, $params = [], $options = [])
    {
        $handler = OptionsHandlerFactory::createInstance($options);
        $results = $this->pearDatabase->pquery($sql, $params, $handler->dieOnError, $handler->message);

        #if (!$results) {
        #    throw new HamperException();
        #}

        return $results;
    }

    /**
     * Fetch one record.
     */
    public function fetch($sql, $params = [], $options = [])
    {
        $handler = OptionsHandlerFactory::createInstance($options);
        $results = $this->pearDatabase->pquery($sql, $params, $handler->dieOnError, $handler->message);

        $row = $this->pearDatabase->query_result_rowdata($results, 0);

        return $row;
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
        /*
        $table= 'vtiger_suite_maiolscanner_account'
        $data = [
            'field_1' => 'value_1',
            'field_2' => 'value_2',
            .
            .
            .
        ]
        $flatData = ['field_1', 'field_', ..., 'value_1', 'value_2']

        $flatData = array_merge(array_keys($data), array_values($data));

        $sql = "INSER INTO $nometabella (?, ?, ...?) VALUES (?, ?, ...?)"
        $PDB->pquery($sql, )
        */




    }

    /**
     * Update one record CIAO.
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
