<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\View\View;
use Packages\User\UserRepository;

class ProfileController extends Controller
{
    public function __invoke(UserRepository $userRepository, Guard $guard): View
    {
        $user = $userRepository->retrieveById($guard->user()->getAuthIdentifier());
        assert($user !== null); // middleware を通っているので，必ずログインした状態でここに来る

        return view('profile', ['user' => $user]);
    }
}
