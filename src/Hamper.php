<?php

namespace Javanile\Hamper;

class Hamper
{
    /**
     * @var
     */
    protected static $instance;

    /**
     *
     */
    public function getInstance()
    {
        if (self::$instance === null) {
            $pdb = \PearDatabase::getInstance();

            self::$instance = new HamperDatabase($pdb);
        }

        return self::$instance;
    }
}
