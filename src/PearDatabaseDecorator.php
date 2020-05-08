<?php

namespace Javanile\Hamper;

use PearDatabase;

class PearDatabaseDecorator
{
    /**
     * @var PearDatabase
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
