<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check())
        {
            if (Auth::user()->role == '2')
            {
                return $next($request);
            }
            else
            return redirect()->back()->with('Message','Access Denied');
        }
        else
        return redirect()->route('index')->with('Message','Sorry!! , you are not Resgistered Yet');
        return $next($request);

    }
}
