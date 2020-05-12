<?php

namespace Javanile\Hamper;

use Javanile\Hamper\PearDatabaseDecorator;

/**
 * Class HamperDatabase is a PearDatabase wrapper used to fulfill the lack
 * of versatility and test-control on the PearDatabase vTiger object.
 *
 * Due to weaknesses as SQL Injection and other possible security weaknesses
 * within the context of Hamper and its query wrapping functions, it has been
 * chosen to always use parametric queries, and not to allow in any case to
 * use a standard SQL query.
 *
 * The long-term intentions of this own wrapper is to facilitate the usage
 * of PearDatabase and to make unit-testing available to any vTiger developer
 * since DBs are as important as any other logical element, and so it should
 * be their ability to be unit-tested constantly and with ease.
 *
 * @package Javanile\Hamper
 */
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

    /*
     * Executes the given parametric query.
     *
     * @usage $hdb->query($sql, $values)
     *
     * @param string $sql The SQL parametric query to be sent.
     * @param array $params The parameters in use within the parametric query sent.
     * @param array $options Any additional option needed.
     *
     * @throws \Exception
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
     * Fetches the next row from the result set rows by the given parametric query.
     *
     * @param string $sql The SQL parametric query to be sent.
     * @param array $params The parameters in use within the parametric query sent.
     * @param array $options Any additional option needed.
     * @return array The result set rows.
     * @throws \Exception This exception is thrown if problems with the query arise.
     */
    public function fetch($sql, $params = [], $options = [])
    {
        $handler = OptionsHandlerFactory::createInstance($options);
        $results = $this->pearDatabase->pquery($sql, $params, $handler->dieOnError, $handler->message);

        $row = $this->pearDatabase->query_result_rowdata($results);

        return $row;
    }

    /**
     *  Returns an array containing all of the result set rows by the given parametric query.
     *
     * @param string $sql The SQL parametric query to be sent.
     * @param array $params The parameters in use within the parametric query sent.
     * @param array $options Any additional option needed.
     * @return array The result set rows.
     * @throws \Exception This exception is thrown if problems with the query arise.
     */
    public function fetchAll($sql, $params = [], $options = [])
    {
        $handler = OptionsHandlerFactory::createInstance($options);
        $results = $this->pearDatabase->pquery($sql, $params, $handler->dieOnError, $handler->message);

        //var_dump($results);
        if ($results != null)
        {
            $rows = [];

            for($rowIndex = 0;$rowIndex < $this->pearDatabase->num_rows($results); $rowIndex++)
            {
                $rows[$rowIndex] = $this->pearDatabase->query_result_rowdata($results, $rowIndex);
            }
            return $rows;
        }
        return [];
    }

    /**
     * Inserts the given record within the selected table.
     *
     * @param mixed $table The table on which the insert has to be executed.
     * @param mixed $data The data to be inserted into the selected table.
     */
    public function insert($table, $data)
    {
        /*
        $table= 'vtiger_suite_mailscanner_account'
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
     * Updates the given record with the given data.
     *
     * @param mixed $table The table and record on which the update has to be executed.
     * @param mixed $data The data to be updated into the selected record.
     */
    public function update($table, $data)
    {

    }

    /**
     * Delete one record.
     */

    /**
     * Deletes the given record within the given table.
     *
     * @param mixed $table The table and record on which the delete has to be executed.
     * @param mixed $data The data to be deleted from the selected record.
     */
    public function delete($table, $data)
    {

    }
}
