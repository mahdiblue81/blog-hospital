<?php

namespace App\queryCast;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class casts implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
       return is_array($value);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        
    }

}