<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Illuminate\Http\Request;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $userRole = Role::find(auth()->user()->role_id);
        foreach ($roles as $role) {
            if ($userRole->name === $role) {
                return $next($request);
            }
        }
        $route = $userRole->name === 'admin' ? 'Admin.dashboard' : 'dashboard';
        return redirect()->route($route)->with('failed', 'Access Denied');
    }
}
