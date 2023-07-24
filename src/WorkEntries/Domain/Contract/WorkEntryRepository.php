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

    /** @return WorkEntry[] */
    public function findAll(): array;

    public function findOneById(Uuid $id): WorkEntry|null;

    /**
     * @param array <string, mixed> $criteria
     * @param array <string, string>|null $orderBy
     * @return WorkEntry[]
     */
    public function findByCriteria(
        array $criteria,
        ?array $orderBy = null,
        ?int $limit = null,
        ?int $offset = null
    ): array;
}
