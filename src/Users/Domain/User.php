<?php

declare(strict_types=1);

namespace App\Users\Domain;

use App\Shared\Domain\Aggregate\AggregateRoot;
use App\Shared\Domain\Aggregate\Timestampable;
use App\Shared\Domain\ValueObject\Uuid;
use App\WorkEntries\Domain\WorkEntry;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class User extends AggregateRoot
{
    use Timestampable;

    private Collection $workEntries;

    public function __construct(
        private Uuid $id,
        private string $name,
        private string $email,
        DateTimeImmutable $createdAt,
        DateTimeImmutable $updatedAt,
        ?DateTimeImmutable $deletedAt
    ) {
        $this->workEntries = new ArrayCollection();

        $this->updateCreatedAt($createdAt);
        $this->updateUpdatedAt($updatedAt);
        $this->updateDeletedAt($deletedAt);
    }

    public static function create(
        Uuid $id,
        string $name,
        string $email,
        DateTimeImmutable $createdAt,
        DateTimeImmutable $updatedAt
    ): self {
        return new self(
            id: $id,
            name: $name,
            email: $email,
            createdAt: $createdAt,
            updatedAt: $updatedAt,
            deletedAt: null
        );
    }

    public function id(): Uuid
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
    
    public function email(): string
    {
        return $this->email;
    }

    public function updateName(string $name): void
    {
        $this->name = $name;
    }

    public function updateEmail(string $email): void
    {
        $this->email = $email;
    }

    public function workEntries(): Collection
    {
        return $this->workEntries;
    }

    public function addWorkEntry(WorkEntry $workEntry): void
    {
        if (!$this->workEntries->contains($workEntry)) {
            $this->workEntries->add($workEntry);
        }
    }

    public function removeWorkEntry(WorkEntry $workEntry): void
    {
        if ($this->workEntries->contains($workEntry)) {
            $this->workEntries->removeElement($workEntry);
        }
    }

    public function getWorkEntryById(Uuid $id): ?WorkEntry
    {
        /** @var WorkEntry $item */
        foreach ($this->workEntries as $item) {
            if ($item->id()->equals($id)) {
                return $item;
            }
        }

        return null;
    }

    public function getLastWorkEntry(): ?WorkEntry
    {
        $workEntry = $this->workEntries->first();
        return ($workEntry !== false) ? $workEntry : null;
    }

    public function toArray(bool $isNestedArray = false): array
    {
        $userArray = [
            'id' => $this->id->value(),
            'name' => $this->name,
            'email' => $this->email,
            'work_entries' => array_map(fn($item) => $item->toArray(true), $this->workEntries->toArray()),
            'created_at' => $this->formatDateTime($this->createdAt),
            'updated_at' => $this->formatDateTime($this->updatedAt),
        ];

        if ($isNestedArray) {
            unset($userArray['work_entries']);
        }

        return $userArray;
    }
}
