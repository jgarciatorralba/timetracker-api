<?php

declare(strict_types=1);

namespace App\WorkEntries\Application\Command\DeleteWorkEntryById;

use App\Shared\Domain\Bus\Command\CommandHandler;
use App\Shared\Domain\ValueObject\Uuid;
use App\WorkEntries\Domain\Service\DeleteWorkEntry;
use App\WorkEntries\Domain\Service\FindWorkEntryById;

final class DeleteWorkEntryByIdCommandHandler implements CommandHandler
{
    public function __construct(
        private readonly FindWorkEntryById $findWorkEntryById,
        private readonly DeleteWorkEntry $deleteWorkEntry
    ) {
    }

    public function __invoke(DeleteWorkEntryByIdCommand $command): void
    {
        $workEntryId = Uuid::fromString($command->id());
        $workEntry = $this->findWorkEntryById->__invoke($workEntryId);

        $this->deleteWorkEntry->__invoke($workEntry);
    }
}
