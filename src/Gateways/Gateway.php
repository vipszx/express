<?php

namespace Vipszx\Express\Gateways;

use Vipszx\Express\Contracts\ExpressNumberInterface;

abstract class Gateway
{
    public function query(ExpressNumberInterface $expressNumber)
    {
    }

    public function subscribe(ExpressNumberInterface $expressNumber, string $callbackUrl)
    {
    }
}
