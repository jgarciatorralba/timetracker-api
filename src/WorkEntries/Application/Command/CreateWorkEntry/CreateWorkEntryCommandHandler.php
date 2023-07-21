<?php

declare(strict_types=1);

namespace App\WorkEntries\Application\Command\CreateWorkEntry;

use App\Shared\Domain\Bus\Command\CommandHandler;
use App\Shared\Domain\ValueObject\Uuid;
use App\Users\Domain\Service\FindUserById;
use App\WorkEntries\Domain\WorkEntry;
use App\WorkEntries\Domain\Service\CreateWorkEntry;

final class CreateWorkEntryCommandHandler implements CommandHandler
{
    public function __construct(
        private readonly FindUserById $findUserById,
        private readonly CreateWorkEntry $createWorkEntry
    ) {
    }

    public function __invoke(CreateWorkEntryCommand $command): void
    {
        $user = $this->findUserById->__invoke(
            Uuid::fromString($command->userId())
        );

        $workEntry = WorkEntry::create(
            id: Uuid::fromString($command->id()),
            user: $user,
            createdAt: $command->createdAt(),
            updatedAt: $command->updatedAt(),
            startDate: $command->startDate(),
            endDate: null
        );

        $this->createWorkEntry->__invoke($workEntry);
    }
}
