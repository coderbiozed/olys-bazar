<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ActiveVendor
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if (!$user || $user->role !== 'vendor' || $user->status !== 'active') {
            return redirect()
                ->route('vendor.dashobard')
                ->with([
                    'message' => 'Your vendor account is pending admin approval.',
                    'alert-type' => 'warning',
                ]);
        }

        return $next($request);
    }
}
