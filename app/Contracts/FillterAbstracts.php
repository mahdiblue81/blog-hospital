<?php

namespace  App\Contracts;

use App\User;
use Closure;
use Illuminate\Support\Str;
abstract class FillterAbstracts
{
    public function handle($request, Closure $next)
    {
        if (!\request()->has($this->filltername())) {
            return $next($request);
        }
        $builder = $next($request);
        return $this->aplayFillter($builder);
    }
    public abstract function aplayFillter($builder);
    public function filltername()
    {
        // Str::snake(class_basename($this));
        return Str::snake(class_basename($this));
    }
}
