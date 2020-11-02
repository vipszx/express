<?php

namespace Vipszx\Express\Exceptions;

class GatewayErrorException extends Exception
{
    public $raw = [];

    public function __construct($message = "", $code = 0, $raw)
    {
        parent::__construct($message, (int)$code);

        $this->raw = $raw;
    }
}
