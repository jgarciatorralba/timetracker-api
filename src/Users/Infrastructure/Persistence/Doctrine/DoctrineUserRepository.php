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

        foreach ($user->workEntries() as $workEntry) {
            $workEntry->updateUpdatedAt($now);
            $workEntry->updateDeletedAt($now);
        }

        $this->updateEntity();
    }

    /**
     * @return User[]
     */
    public function findAll(): array
    {
        return $this->repository()->findAll();
    }

    public function findOneById(Uuid $id): User|null
    {
        return $this->repository()->findOneBy(['id' => $id->value()]);
    }

    /**
     * @param array<string, mixed> $criteria
     * @param array<string, string>|null $orderBy
     * @return User[]
     */
    public function findByCriteria(
        array $criteria = [],
        ?array $orderBy = null,
        ?int $limit = null,
        ?int $offset = null
    ): array {
        return $this->repository()->findBy($criteria, $orderBy, $limit, $offset);
    }
}
