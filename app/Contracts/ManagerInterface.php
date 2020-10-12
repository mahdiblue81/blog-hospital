<?php

namespace App\Contracts;

interface ManagerInterface
{
    public function docterReject($id);
    public function docterAccept($id);
}
