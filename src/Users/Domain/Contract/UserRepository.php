<?php

declare(strict_types=1);

namespace App\Users\Domain\Contract;

use App\Users\Domain\User;
use App\Shared\Domain\ValueObject\Uuid;

interface UserRepository
{
    public function create(User $user): void;

    public function update(User $user): void;

    public function delete(User $user): void;

    public function findAll(): array;

    public function findOneById(Uuid $id): User|null;
}
