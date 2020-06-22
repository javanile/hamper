<?php

namespace Javanile\Hamper;

class OptionsHandlerFactory
{
    /**
     * @param array $options
     * @return OptionsHandler
     */
    public static function createInstance($options = [])
    {
        return new OptionsHandler($options);
    }
}
