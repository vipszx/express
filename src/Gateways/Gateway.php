<?php

namespace Vipszx\Express\Gateways;

use Vipszx\Express\Contracts\PackageInterface;

abstract class Gateway
{
    public function query(PackageInterface $package)
    {
    }

    public function subscribe(PackageInterface $package, string $callbackUrl)
    {
    }
}
