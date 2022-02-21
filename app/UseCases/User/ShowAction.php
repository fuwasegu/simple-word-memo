<?php
declare(strict_types=1);

namespace App\UseCases\User;

use Illuminate\Auth\AuthManager;
use Packages\User\Exception\UserNotFoundException;
use Packages\User\User;
use Packages\User\UserRepository;
use RuntimeException;

class ShowAction
{
    public function __construct(
        private AuthManager $authManager,
        private UserRepository $userRepository,
    ){
    }

    public function __invoke(): User
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
            throw new RuntimeException('User not found.');
        }

        return $user;
    }
}
