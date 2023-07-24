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

    /** @return User[] */
    public function findAll(): array;

    public function findOneById(Uuid $id): User|null;

    /**
     * @param array <string, mixed> $criteria
     * @param array <string, string>|null $orderBy
     * @return User[]
     */
    public function findByCriteria(
        array $criteria,
        ?array $orderBy = null,
        ?int $limit = null,
        ?int $offset = null
    ): array;
}
