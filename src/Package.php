<?php

namespace Vipszx\Express;

use Vipszx\Express\Contracts\PackageInterface;

class Package implements PackageInterface
{
    protected $number;
    protected $companyCode;
    protected $senderAddress;
    protected $receiverAddress;
    protected $receiverContact;

    public function __construct(
        $number,
        $companyCode = '',
        $senderAddress = '',
        $receiverAddress = '',
        $receiverContact = ''
    ) {
        $this->number = $number;
        $this->companyCode = $companyCode;
        $this->senderAddress = $senderAddress;
        $this->receiverAddress = $receiverAddress;
        $this->receiverContact = $receiverContact;
    }

    public function getCompanyCode()
    {
        return $this->companyCode;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getSenderAddress()
    {
        return $this->senderAddress;
    }

    public function getReceiverAddress()
    {
        return $this->receiverAddress;
    }

    public function getReceiverContact()
    {
        return $this->receiverContact;
    }
}
