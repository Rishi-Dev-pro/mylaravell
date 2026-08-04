<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PasswordLengthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
   public function handle(Request $request, Closure $next): Response
    {
        if (strlen($request->password) < 8) {
            return back()
                ->withErrors([
                    'password' => 'Password must be at least 8 characters long.'
                ])
                ->withInput();
        }

        return $next($request);
    }
}
