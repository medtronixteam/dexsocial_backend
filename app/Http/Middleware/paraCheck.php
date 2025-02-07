<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class paraCheck
{
 
    
    public function handle($request, Closure $next)
    {
        // You can access $this->parameters within the middleware logic
       dd( $request->merge(['branchNamePre' => 'Hello']));

        return $next($request);
    }
    
}
