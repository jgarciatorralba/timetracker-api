<?php

declare(strict_types=1);

namespace App\WorkEntries\Application\Command\CreateWorkEntry;

use DateTimeImmutable;
use App\Shared\Domain\Bus\Command\Command;

final class CreateWorkEntryCommand implements Command
{
    public function __construct(
        private readonly string $id,
        private readonly string $userId,
		private readonly DateTimeImmutable $startDate,
        private readonly ?DateTimeImmutable $endDate,
		private readonly DateTimeImmutable $createdAt,
		private readonly DateTimeImmutable $updatedAt,
        private readonly ?DateTimeImmutable $deletedAt
    ) {}

	public function id(): string
	{
		return $this->id;
	}

    public function userId(): string
	{
		return $this->userId;
	}

    public function startDate(): DateTimeImmutable
	{
		return $this->startDate;
	}

    public function endDate(): ?DateTimeImmutable
	{
		return $this->endDate;
	}

	public function createdAt(): DateTimeImmutable
	{
		return $this->createdAt;
	}

	public function updatedAt(): DateTimeImmutable
	{
		return $this->updatedAt;
	}

    public function deletedAt(): ?DateTimeImmutable
	{
		return $this->deletedAt;
	}
}
