<?php

declare(strict_types=1);

namespace App\UseCases\User;

use Illuminate\Auth\AuthManager;
use JetBrains\PhpStorm\ArrayShape;
use Packages\User\Exception\UserNotFoundException;
use Packages\User\UserRepository;

class ShowAction
{
    public function __construct(
        private AuthManager $authManager,
        private UserRepository $userRepository,
    ){
    }

    /**
     * @throws UserNotFoundException
     */
    #[ArrayShape(['message' => "string", 'user' => "array"])] public function __invoke(): array
    {
        try {
            $user =  $this->userRepository
                ->retrieveByIdOrFail(
                    $this->authManager
                        ->guard()
                        ->user()
                        ->getAuthIdentifier(),
                );
        } catch (UserNotFoundException $exception) {
            throw $exception;
        }

        return [
            'message' => 'Success',
            'user' => [
                'id' => $user->id(),
                'name' => $user->name(),
                'email' => $user->email(),
            ],
        ];
    }
}
