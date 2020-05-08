<?php

namespace Javanile\Hamper;

use PearDatabase;

class PearDatabaseDecorator
{
    /**
     *
     */
    protected $pearDatabase;

    /**
     * Database constructor.
     *
     * @param PearDatabase $pearDatabase
     */
    public function __construct($pearDatabase)
    {
        $this->pearDatabase = $pearDatabase;
    }
}
