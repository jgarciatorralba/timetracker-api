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
        private DateTimeImmutable $startDate,
        private ?DateTimeImmutable $endDate
    ) {
    }

    public static function create(
        Uuid $id,
        User $user,
        DateTimeImmutable $startDate,
        ?DateTimeImmutable $endDate
    ): self {
        return new self(
            id: $id,
            user: $user,
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

    public function toArray(bool $isNestedArray = false): array
    {
        $workEntryArray = [
            'id' => $this->id->value(),
            'user' => [],
            'start_date' => $this->formatDateTime($this->startDate),
            'end_date' => !empty($this->endDate) ? $this->formatDateTime($this->endDate) : null,
            'created_at' => $this->formatDateTime($this->createdAt),
            'updated_at' => $this->formatDateTime($this->updatedAt)
        ];

        if ($isNestedArray) {
            unset($workEntryArray['user']);
        } else {
            $workEntryArray['user'] = $this->user->toArray(true);
        }

        return $workEntryArray;
    }
}
