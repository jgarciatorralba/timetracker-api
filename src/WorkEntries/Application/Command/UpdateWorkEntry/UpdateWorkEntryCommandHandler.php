<?php

declare(strict_types=1);

namespace App\WorkEntries\Application\Command\UpdateWorkEntry;

use App\Shared\Domain\Bus\Command\CommandHandler;
use App\Shared\Domain\ValueObject\Uuid;
use App\WorkEntries\Domain\Service\FindWorkEntryById;
use App\WorkEntries\Domain\Service\UpdateWorkEntry;

final class UpdateWorkEntryCommandHandler implements CommandHandler
{
    public function __construct(
        private readonly FindWorkEntryById $findWorkEntryById,
        private readonly UpdateWorkEntry $updateWorkEntry
    ) {
    }

    public function __invoke(UpdateWorkEntryCommand $command): void
    {
        $workEntry = $this->findWorkEntryById->__invoke(
            Uuid::fromString($command->id())
        );

        $this->updateWorkEntry->__invoke($workEntry, [
            'startDate' => $command->startDate(),
            'endDate' => $command->endDate()
        ]);
    }
}
