<?php

declare(strict_types=1);

namespace Packages\User;

use App\Models\User as UserRecord;
use Illuminate\Contracts\Auth\Authenticatable;
use JetBrains\PhpStorm\Pure;

class User implements Authenticatable
{
    public function __construct(
        private UserRecord $model
    ) {
        assert($model->exists);
    }

    public function id(): int
    {
        return $this->model->id;
    }

    public function name(): string
    {
        return $this->model->name;
    }

    public function email(): string
    {
        return $this->model->email;
    }

    public function getAuthIdentifierName(): string
    {
        return 'id';
    }

    #[Pure] public function getAuthIdentifier(): int
    {
        return $this->id();
    }

    public function getAuthPassword()
    {
        return null;
    }

    public function getRememberToken()
    {
        return null;
    }

    public function setRememberToken($value)
    {
        return null;
    }

    public function getRememberTokenName()
    {
        return null;
    }
}
