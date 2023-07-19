<?php

declare(strict_types=1);

namespace App\WorkEntries\Domain\Contract;

use App\Shared\Domain\ValueObject\Uuid;
use App\WorkEntries\Domain\WorkEntry;

interface WorkEntryRepository
{
    public function create(WorkEntry $workEntry): void;

    public function update(WorkEntry $workEntry): void;

    public function delete(WorkEntry $workEntry): void;

    public function findAll(): array;

    public function findOneById(Uuid $id): WorkEntry|null;

    /** @return WorkEntry[] */
    public function findByCriteria(
        array $criteria,
        ?array $orderBy = null,
        ?int $limit = null,
        ?int $offset = null
    ): array;
}
