<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PermissionEqualToUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $isUserManagement = Auth::user()->hasPermission('user-management');

        $editUserId = $request->route('user')->id;
        $isEditUserManagement = User::firstWhere('id', $editUserId)->hasPermission('user-management');

        if (!$isUserManagement && $isEditUserManagement) abort(403);

        return $next($request);
    }
}
