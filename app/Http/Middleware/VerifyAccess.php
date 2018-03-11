<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;

class VerifyAccess
{
    /**
     * Handle an incoming request.
     *
     * @param $request
     * @param Closure $next
     * @param string $role
     *
     * @return $this|mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (!$request->user()->hasRole($role)) {
            return redirect()->back()->withErrors(__('auth.not_authorized'));
        }

        return $next($request);
    }
}
