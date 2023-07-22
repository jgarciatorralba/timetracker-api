<?php

declare(strict_types=1);

namespace App\WorkEntries\Application\Command\UpdateWorkEntry;

use DateTimeImmutable;
use App\Shared\Domain\Bus\Command\Command;

final class UpdateWorkEntryCommand implements Command
{
    public function __construct(
        private readonly string $id,
        private readonly ?DateTimeImmutable $startDate,
        private readonly ?DateTimeImmutable $endDate
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function startDate(): ?DateTimeImmutable
    {
        return $this->startDate;
    }

    public function endDate(): ?DateTimeImmutable
    {
        return $this->endDate;
    }
}
