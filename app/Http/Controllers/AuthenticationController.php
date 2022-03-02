<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Laravel\Socialite\SocialiteManager;
use Laravel\Socialite\Two\GoogleProvider;
use Symfony\Component\HttpFoundation\JsonResponse;
use Packages\User\UserRepository;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationController extends Controller
{
    /**
     * 本アプリケーションでは，ログインに Google OAuth2 のみを利用するため，AuthManager を決め打ちする
     */
    public function login(GoogleProvider $googleProvider): RedirectResponse
    {
        return $googleProvider
            ->redirect();
    }

    /**
     * 本アプリケーションでは，ログインに Google OAuth2 のみを利用するため，AuthManager を決め打ちする
     */
    public function callback(
        StatefulGuard $guard,
        GoogleProvider $googleProvider,
        UserRepository $userRepository
    ) {
        $googleUser = $googleProvider->stateless()->user();

        $user = $userRepository->retrieveByEmailOrCreate(
            email: $googleUser->getEmail(),
            name: $googleUser->getName(),
            googleId: $googleUser->getId(),
        );

        $guard->login($user);
        return redirect('/');
    }

    public function logout(Request $request, StatefulGuard $guard): View
    {
        $guard->logout();

        // セッション固定攻撃対策．現在のセッションを破棄してセッションIDを再生性
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('login');
    }
}
