<?php

namespace Vipszx\Express;

use Vipszx\Express\ExpressNumber;
use Vipszx\Express\Gateways\Gateway;

class Express
{
    protected $gateway;

    public function __construct(Gateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function query(ExpressNumber $expressNo)
    {
        return $this->gateway->query($expressNo);
    }

    public function subscribe(ExpressNumber $expressNo, $callbackUrl)
    {
        return $this->gateway->subscribe($expressNo, $callbackUrl);
    }
}
