<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * 本アプリケーションでは，Google OAuth2 のみを利用するため Guard を区別しない
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (! $this->auth->guard()->check()) {
            return response(view('login'));
        }

        return $next($request);
    }
}
