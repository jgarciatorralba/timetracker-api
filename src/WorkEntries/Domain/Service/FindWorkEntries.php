<?php

declare(strict_types=1);

namespace App\WorkEntries\Domain\Service;

use App\WorkEntries\Domain\Contract\WorkEntryRepository;
use App\WorkEntries\Domain\WorkEntry;

final class FindWorkEntries
{
    public function __construct(
        private readonly WorkEntryRepository $workEntryRepository
    ) {
    }

    /** @return WorkEntry[] */
    public function __invoke(): array
    {
        return $this->workEntryRepository->findAll();
    }
}
