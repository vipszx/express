<?php

namespace Vipszx\Express;

use Vipszx\Express\Contracts\ExpressNumberInterface;

class ExpressNumber implements ExpressNumberInterface
{
    protected $number;
    protected $companyCode;

    public function __construct($number, $companyCode = '')
    {
        $this->number = $number;
        $this->companyCode = $companyCode;
    }

    public function getCompanyCode()
    {
        return $this->companyCode;
    }

    public function getNumber()
    {
        return $this->number;
    }
}
