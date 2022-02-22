<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends Middleware
{
    /**
     * 本アプリケーションでは，Google OAuth2 のみを利用するため Guard を区別しない
     */
    public function handle($request, Closure $next, ...$guards)
    {
        if (! $this->auth->guard()->check()) {
            return new JsonResponse([
                'message' => 'Unauthorized'
            ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
