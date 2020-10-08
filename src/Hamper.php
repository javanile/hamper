<?php

namespace Javanile\Hamper;

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
