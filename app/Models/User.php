<?php

namespace App\Models;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Packages\User\User as UserEntity;

/**
 * @property int $id                    ID
 * @property string $name               ユーザー名
 * @property string $email              メールアドレス
 * @property string $google_id          GoogleID
 * @property CarbonImmutable $created_at
 * @property CarbonImmutable $updated_at
 */
class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'google_id',
    ];

    protected $hidden = [
        'google_id',
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'google_id' => 'string',
        'created_at' => CarbonImmutable::class,
        'updated_at' => CarbonImmutable::class,
    ];

    public function toEntity(): UserEntity
    {
        return new UserEntity($this);
    }
}
