<?php

namespace App\WorkEntries\Domain;

use App\Shared\Domain\Aggregate\AggregateRoot;
use App\Shared\Domain\Aggregate\Timestampable;
use App\Shared\Domain\ValueObject\Uuid;
use App\Shared\Utils;
use App\Users\Domain\User;
use DateTimeImmutable;

class WorkEntry extends AggregateRoot
{
    use Timestampable;

    public function __construct(
        private Uuid $id,
        private readonly User $user,
        private DateTimeImmutable $startDate,
        private ?DateTimeImmutable $endDate,
        DateTimeImmutable $createdAt,
        DateTimeImmutable $updatedAt
    ) {
        $this->updateCreatedAt($createdAt);
        $this->updateUpdatedAt($updatedAt);
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
            endDate: $endDate,
            createdAt: new DateTimeImmutable(),
            updatedAt: new DateTimeImmutable()
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
            'start_date' => Utils::dateToString($this->startDate),
            'end_date' => !empty($this->endDate) ? Utils::dateToString($this->endDate) : null,
            'created_at' => Utils::dateToString($this->createdAt),
            'updated_at' => Utils::dateToString($this->updatedAt)
        ];

        if ($isNestedArray) {
            unset($workEntryArray['user']);
        } else {
            $workEntryArray['user'] = $this->user->toArray(true);
        }

        return $workEntryArray;
    }
}
