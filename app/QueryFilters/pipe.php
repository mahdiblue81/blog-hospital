<?php

class pipe
{
    public function handle($request,$closure,$next)
    {
        if($request->where('isDoctor',1)->where('is_active',null))
        {
            return $next($request);
        }
        
    }
}
