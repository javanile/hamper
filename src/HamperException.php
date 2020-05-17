<?php

namespace Javanile\Hamper;

class HamperException extends \Exception
{
    /**
     * @param $state
     * @return HamperException
     */
    public static function forSqlError($state)
    {
        $file = $state['backtrace'][0]['file'].':'.$state['backtrace'][0]['line'];
        $message = '['.$state['pearDatabase']->database->ErrorNo().'] '.$state['pearDatabase']->database->ErrorMsg();
        return new self("Hamper SQL error: {$message} in {$file}");
    }

    /**
     * @param $state
     * @return HamperException
     */
    public static function forMissingKey($state)
    {
        $file = $state['backtrace'][0]['file'].':'.$state['backtrace'][0]['line'];
        $message = 'Required a valid key argument with value in data argument';
        return new self("Hamper arguments error: {$message} in {$file}");
    }
}
