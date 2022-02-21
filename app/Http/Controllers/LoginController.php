<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Auth\AuthManager;
use Illuminate\Contracts\Auth\Authenticatable;
use Laravel\Socialite\SocialiteManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Packages\user\UserRepository;

class LoginController extends Controller
{
    public function login(SocialiteManager $socialiteManager)
    {
        return $socialiteManager
            ->driver('google')
            ->redirect();
    }

    public function callback(
        AuthManager $authManager,
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

        assert($user instanceof Authenticatable);
        $authManager->guard()->login($user);

        return new JsonResponse(
            data: [
                'message' => 'login success',
            ],
            status: 200,
        );
    }
}
