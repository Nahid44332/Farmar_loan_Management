<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                
                // মামা, এই কন্ডিশনটি চেক করবে লগইন করা ইউজারটি 'farmer' গার্ডের কি না
                if ($guard === 'farmer') {
                    return redirect()->route('farmer.dashboard');
                }

                // 👈 নতুন যোগ করুন: লগইন করা ইউজারটি 'agent' গার্ডের কি না তা চেক করবে
                if ($guard === 'agent') {
                    return redirect()->route('agent.dashboard');
                }

                // ডিফল্টভাবে অন্য সব গার্ড বা সাধারণ ইউজারদের জন্য যা ছিল
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}