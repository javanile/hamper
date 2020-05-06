<?php

namespace Javanile\Hamper;

class OptionsHandler
{
    /**
     * @var
     */
    public $dieOnError;

    /**
     *
     */
    public $message;

    /**
     * OptionsHandler constructor.
     * @param array $options
     */
    public function __construct($options = [])
    {
        $this->dieOnError = boolval(isset($options['dieOnError']) && $options['dieOnError']);
        $this->message = isset($options['message']) && $options['message'] ? strval($options['message']) : '';
    }
}
