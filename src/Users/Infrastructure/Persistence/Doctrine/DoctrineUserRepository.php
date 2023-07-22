<?php

declare(strict_types=1);

namespace App\Users\Infrastructure\Persistence\Doctrine;

use App\Shared\Domain\ValueObject\Uuid;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;
use App\Users\Domain\Contract\UserRepository;
use App\Users\Domain\User;
use DateTimeImmutable;

class DoctrineUserRepository extends DoctrineRepository implements UserRepository
{
    protected function entityClass(): string
    {
        return User::class;
    }

    public function create(User $user): void
    {
        $now = new DateTimeImmutable();
        $user->updateCreatedAt($now);
        $user->updateUpdatedAt($now);

        $this->persist($user);
    }

    public function update(User $user): void
    {
        $now = new DateTimeImmutable();
        $user->updateUpdatedAt($now);

        $this->updateEntity();
    }

    public function delete(User $user): void
    {
        $now = new DateTimeImmutable();
        $user->updateUpdatedAt($now);
        $user->updateDeletedAt($now);

        $this->updateEntity();
    }

    public function findAll(): array
    {
        return $this->repository()->findAll();
    }

    public function findOneById(Uuid $id): User|null
    {
        return $this->repository()->findOneBy(['id' => $id->value()]);
    }

    public function findByCriteria(
        array $criteria = [],
        ?array $orderBy = null,
        ?int $limit = null,
        ?int $offset = null
    ): array {
        return $this->repository()->findBy($criteria, $orderBy, $limit, $offset);
    }
}
