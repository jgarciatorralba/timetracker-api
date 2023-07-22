<?php

declare(strict_types=1);

namespace App\WorkEntries\Application\Command\DeleteWorkEntryById;

use App\Shared\Domain\Bus\Command\Command;
use DateTimeImmutable;

final class DeleteWorkEntryByIdCommand implements Command
{
    public function __construct(
        private readonly string $id,
        private readonly DateTimeImmutable $updatedAt,
        private readonly DateTimeImmutable $deletedAt
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function updatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function deletedAt(): DateTimeImmutable
    {
        return $this->deletedAt;
    }
}