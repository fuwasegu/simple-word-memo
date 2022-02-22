<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\Request;
use Laravel\Socialite\SocialiteManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Packages\User\UserRepository;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationController extends Controller
{
    public function login(SocialiteManager $socialiteManager)
    {
        return $socialiteManager
            ->driver('google')
            ->redirect();
    }

    public function callback(
        StatefulGuard $guard,
        SocialiteManager $socialiteManager,
        UserRepository $userRepository
    ): JsonResponse {
        $googleUser = $socialiteManager
            ->driver('google')
            ->user();

        $user = $userRepository->retrieveByEmailOrCreate(
            email: $googleUser->getEmail(),
            name: $googleUser->getName(),
            googleId: $googleUser->getId(),
        );

        $guard->login($user);

        return new JsonResponse([
                'message' => 'Logged in',
            ], Response::HTTP_OK,);
    }

    public function logout(Request $request, StatefulGuard $guard): JsonResponse
    {
        $guard->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return new JsonResponse([
            'message' => 'Logged out'
        ], Response::HTTP_OK,);
    }
}
