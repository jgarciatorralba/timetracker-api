<?php

declare(strict_types=1);

namespace App\WorkEntries\Domain\Service;

use App\WorkEntries\Domain\Contract\WorkEntryRepository;
use App\WorkEntries\Domain\WorkEntry;

final class CreateWorkEntry
{
    public function __construct(
        private readonly WorkEntryRepository $workEntryRepository
    ) {
    }

    public function __invoke(WorkEntry $workEntry): void
    {
        $this->workEntryRepository->create($workEntry);
    }
}
