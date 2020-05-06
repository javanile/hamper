<?php

namespace Javanile\Hamper;

use Javanile\Hamper\PearDatabaseDecorator;
use SebastianBergmann\Environment\OperatingSystemTest;

class HamperDatabase extends PearDatabaseDecorator
{
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
     *
     */
    public function fetch($sql)
    {

    }

    /**
     *
     */
    public function fetchAll($sql)
    {

    }

    /**
     *
     */
    public function insert($table, $data)
    {

    }

    /**
     *
     */
    public function update($table, $data)
    {

    }

    /**
     *
     */
    public function delete($table, $data)
    {

    }
}
