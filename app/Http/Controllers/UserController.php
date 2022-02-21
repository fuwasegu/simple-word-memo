<?php

namespace App\Http\Controllers;

use App\UseCases\User\ShowAction;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{
    /**
     * 現在ログイン中のユーザー情報を返す
     */
    public function show(ShowAction $action): JsonResponse
    {
        $user = $action();

        return new JsonResponse([
            'id' => $user->id(),
            'name' => $user->name(),
            'email' => $user->email(),
        ]);
    }
}
