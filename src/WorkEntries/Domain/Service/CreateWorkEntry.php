<?php

declare(strict_types=1);

namespace App\WorkEntries\Domain\Service;

use App\Users\Domain\Contract\UserRepository;
use App\WorkEntries\Domain\WorkEntry;

final class CreateWorkEntry
{
    public function __construct(
        private readonly UserRepository $userRepository
    ) {
    }

    public function __invoke(WorkEntry $workEntry): void
    {
        $workEntryUser = $workEntry->user();
        $workEntryUser->addWorkEntry($workEntry);

        $this->userRepository->update($workEntryUser);
    }
}
