<?php

declare(strict_types=1);

namespace App\WorkEntries\Domain\Service;

use App\WorkEntries\Domain\Contract\WorkEntryRepository;
use App\WorkEntries\Domain\WorkEntry;

final class DeleteWorkEntry
{
    public function __construct(
        private readonly WorkEntryRepository $workEntryRepository
    ) {
    }

    public function __invoke(WorkEntry $workEntry): void
    {
        $this->workEntryRepository->delete($workEntry);
    }
}
