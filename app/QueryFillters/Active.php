<?php

namespace App\QueryFillters;

use App\Contracts\FillterAbstracts;
use Closure;

class Active extends FillterAbstracts
{

    public function aplayFillter($builder)
    {
        return $builder->where('isMember',request($this->filltername()));
    }
}
