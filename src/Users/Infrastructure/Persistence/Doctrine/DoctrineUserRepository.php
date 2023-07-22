<?php

declare(strict_types=1);

namespace App\Users\Infrastructure\Persistence\Doctrine;

use App\Shared\Domain\ValueObject\Uuid;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;
use App\Users\Domain\Contract\UserRepository;
use App\Users\Domain\User;

class DoctrineUserRepository extends DoctrineRepository implements UserRepository
{
    protected function entityClass(): string
    {
        return User::class;
    }

    public function create(User $user): void
    {
        $this->persist($user);
    }

    public function update(User $user): void
    {
        $this->updateEntity();
    }

    public function delete(User $user): void
    {
        $this->updateEntity();
    }

    public function findAll(): array
    {
        return $this->findByCriteria([]);
    }

    public function findOneById(Uuid $id): User|null
    {
        return $this->repository()->findOneBy([
            'id' => $id->value(),
            'deletedAt' => null
        ]);
    }

    public function findByCriteria(
        array $criteria,
        ?array $orderBy = null,
        ?int $limit = null,
        ?int $offset = null
    ): array {
        $criteria['deletedAt'] = null;

        return $this->repository()->findBy($criteria, $orderBy, $limit, $offset);
    }
}
