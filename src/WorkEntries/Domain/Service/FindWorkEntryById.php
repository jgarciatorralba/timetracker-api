<?php

declare(strict_types=1);

namespace App\WorkEntries\Domain\Service;

use App\Shared\Domain\ValueObject\Uuid;
use App\WorkEntries\Domain\Contract\WorkEntryRepository;
use App\WorkEntries\Domain\Exception\WorkEntryNotFoundException;
use App\WorkEntries\Domain\WorkEntry;

final class FindWorkEntryById
{
    public function __construct(
        private readonly WorkEntryRepository $workEntryRepository
    ) {
    }

    public function __invoke(Uuid $id): WorkEntry
    {
        $workEntry = $this->workEntryRepository->findOneById($id);
        if ($workEntry === null) {
            throw new WorkEntryNotFoundException($id);
        }

        return $workEntry;
    }
}
