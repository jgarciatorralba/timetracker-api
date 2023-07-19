<?php

declare(strict_types=1);

namespace App\Users\Infrastructure\Persistence\Doctrine;

use App\Shared\Domain\ValueObject\Uuid;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;
use App\WorkEntries\Domain\WorkEntry;
use App\WorkEntries\Domain\Contract\WorkEntryRepository;
use DateTimeImmutable;

class DoctrineWorkEntryRepository extends DoctrineRepository implements WorkEntryRepository
{
    protected function entityClass(): string
    {
        return User::class;
    }

    public function create(WorkEntry $workEntry): void
    {
        $this->persist($workEntry);
    }

    public function update(WorkEntry $workEntry): void
    {
        $this->updateEntity();
    }

    public function delete(WorkEntry $workEntry): void
    {
        $now = new DateTimeImmutable();
        $workEntry->updateUpdatedAt($now);
        $workEntry->updateDeletedAt($now);
        $this->updateEntity();
    }

    public function findAll(): array
    {
        return $this->repository()->findBy(['deletedAt' => null]);
    }

    public function findOneById(Uuid $id): WorkEntry|null
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
        return $this->repository()->findBy($criteria, $orderBy, $limit, $offset);
    }
}
