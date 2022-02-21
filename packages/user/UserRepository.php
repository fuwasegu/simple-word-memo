<?php

declare(strict_types=1);

namespace Packages\User;

use App\Models\User as UserRecord;
use Illuminate\Support\Facades\DB;
use Packages\User\Exception\UserNotFoundException;

class UserRepository
{
    public function retrieveById(int $id): ?User
    {
        return DB::transaction(
            fn () => UserRecord::query()
                ->find($id)
                ?->toEntity()
        );
    }

    /**
     * @throws UserNotFoundException
     */
    public function retrieveByIdOrFail(int $id): User
    {
        if (! $user = $this->retrieveById($id)) {
            throw new UserNotFoundException();
        }

        return $user;
    }

    public function retrieveByEmailOrCreate(string $email, string $name, string $googleId): User
    {
        return DB::transaction(
            fn() => UserRecord::query()
                ->firstOrCreate([
                    'email' => $email,
                ], [
                    'name' => $name,
                    'google_id' => $googleId,
                ])
            ->toEntity(),
        );
    }
}
