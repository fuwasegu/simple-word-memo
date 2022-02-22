<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\UseCases\User\ShowAction;
use Packages\User\Exception\UnauthorizedException;
use Packages\User\Exception\UserNotFoundException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * 現在ログイン中のユーザー情報を返す
     */
    public function show(ShowAction $action): JsonResponse
    {
        try {
            $user = $action();
        } catch (UserNotFoundException $exception) {
            return new JsonResponse(['message' => 'User not found.'], Response::HTTP_NOT_FOUND);
        } catch (UnauthorizedException $exception) {
            return new JsonResponse(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }

        return new JsonResponse($user, Response::HTTP_OK);
    }
}
