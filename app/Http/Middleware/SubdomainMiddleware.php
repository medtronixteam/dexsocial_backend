<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class SubdomainMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $subdomain = $request->route('subdomain');
        $subdomainRecord = User::where('username', $subdomain)->first();

        if ($subdomainRecord) {
            // Store the subdomain ID in the session
            session(['subdomain_id' => $subdomainRecord->id]);
            session(['subdomain' => $subdomain]);
            if($subdomainRecord->role=='admin'){
               
                $subdomaiBranch = User::where('id', $subdomainRecord->branch_id)->first();
                session(['subdomain_id' => $subdomaiBranch->id]);
                session(['subdomain' => $subdomaiBranch->username]);
                session(['branchNamePre' => $subdomainRecord->username]);
            }
           
        }
        return $next($request);
    }
}
