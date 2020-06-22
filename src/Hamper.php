<?php

namespace Javanile\Hamper;


class Hamper
{
    /**
     * @var HamperDatabase
     */
    protected static $instance;

    /**
     * Get singletone instance of database.
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            $pdb = \PearDatabase::getInstance();

            self::$instance = new HamperDatabase($pdb);
        }

        return self::$instance;
    }
}
