<?php

namespace Vipszx\Express;

use Vipszx\Express\Contracts\PackageInterface;
use Vipszx\Express\Gateways\Gateway;

class Express
{
    protected $gateway;

    public function __construct(Gateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function query(PackageInterface $package)
    {
        return $this->gateway->query($package);
    }

    public function subscribe(PackageInterface $package, $callbackUrl)
    {
        return $this->gateway->subscribe($package, $callbackUrl);
    }
}
