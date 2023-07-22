<?php

declare(strict_types=1);

namespace App\WorkEntries\Domain\Service;

use App\WorkEntries\Domain\WorkEntry;
use App\WorkEntries\Domain\Contract\WorkEntryRepository;
use App\WorkEntries\Domain\Exception\InvalidDatesException;

final class UpdateWorkEntry
{
    public function __construct(
        private readonly WorkEntryRepository $workEntryRepository
    ) {
    }

    public function __invoke(WorkEntry $workEntry, array $updatedData): void
    {
        $effectiveStartDate = empty($updatedData['startDate'])
            ? $workEntry->startDate()
            : $updatedData['startDate'];

        $effectiveEndDate = empty($updatedData['endDate'])
            ? $workEntry->endDate()
            : $updatedData['endDate'];

        if (
            !is_null($effectiveEndDate)
            && $effectiveEndDate->getTimestamp() !== 0
            && $effectiveEndDate->getTimestamp() < $effectiveStartDate->getTimestamp()
        ) {
            throw new InvalidDatesException($effectiveStartDate, $effectiveEndDate);
        }

        $hasChanged = false;

        if (
            !empty($updatedData['startDate'])
            && $updatedData['startDate']->getTimestamp() !== $workEntry->startDate()->getTimestamp()
        ) {
            $workEntry->updateStartDate($updatedData['startDate']);
            $hasChanged = true;
        }
        if (
            !empty($updatedData['endDate'])
            && (
                is_null($workEntry->endDate())
                || $updatedData['endDate']->getTimestamp() !== $workEntry->endDate()->getTimestamp()
            )
        ) {
            $workEntry->updateEndDate(
                $updatedData['endDate']->getTimestamp() === 0 ? null : $updatedData['endDate']
            );
            $hasChanged = true;
        }

        if ($hasChanged) {
            $this->workEntryRepository->update($workEntry);
        }
    }
}
