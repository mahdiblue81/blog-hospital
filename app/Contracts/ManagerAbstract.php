<?php

namespace  App\Contracts;
use App\User;

abstract class ManagerAbstract
{
    public $value;
    public function __construct($value)
    {
        $this->value = $value;
    }
    abstract public function docterAcceptOrReject();
}

