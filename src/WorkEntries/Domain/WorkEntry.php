<?php

namespace App\WorkEntries\Domain;

use App\Shared\Domain\Aggregate\AggregateRoot;
use App\Shared\Domain\Aggregate\Timestampable;
use App\Shared\Domain\ValueObject\Uuid;
use App\Users\Domain\User;
use DateTimeImmutable;

class WorkEntry extends AggregateRoot
{
    use Timestampable;

    public function __construct(
        private Uuid $id,
        private readonly User $user,
        DateTimeImmutable $createdAt,
        DateTimeImmutable $updatedAt,
        ?DateTimeImmutable $deletedAt,
        private DateTimeImmutable $startDate,
        private ?DateTimeImmutable $endDate
    ) {
        $this->updateCreatedAt($createdAt);
        $this->updateUpdatedAt($updatedAt);
        $this->updateDeletedAt($deletedAt);
    }

    public static function create(
        Uuid $id,
        User $user,
        DateTimeImmutable $createdAt,
        DateTimeImmutable $updatedAt,
        DateTimeImmutable $startDate,
        ?DateTimeImmutable $endDate
    ): self {
        return new self(
            id: $id,
            user: $user,
            createdAt: $createdAt,
            updatedAt: $updatedAt,
            deletedAt: null,
            startDate: $startDate,
            endDate: $endDate
        );
    }

    public function id(): Uuid
    {
        return $this->id;
    }

    public function user(): User
    {
        return $this->user;
    }

    public function startDate(): DateTimeImmutable
    {
        return $this->startDate;
    }

    public function endDate(): ?DateTimeImmutable
    {
        return $this->endDate;
    }

    public function updateStartDate(DateTimeImmutable $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function updateEndDate(?DateTimeImmutable $endDate): void
    {
        $this->endDate = $endDate;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->value(),
            'user' => $this->user->toArray(),
            'created_at' => $this->createdAt,
            'updated_at' => $this->updatedAt,
            'deleted_at' => $this->deletedAt,
            'start_date' => $this->startDate,
            'end_date' => $this->endDate
        ];
    }
}
