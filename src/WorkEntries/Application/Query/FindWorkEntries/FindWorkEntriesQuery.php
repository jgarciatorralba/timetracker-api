<?php

declare(strict_types=1);

namespace App\WorkEntries\Application\Query\FindWorkEntries;

use App\Shared\Domain\Bus\Query\Query;

final class FindWorkEntriesQuery implements Query
{
    public function __construct(
        private readonly array $userIds
    ) {
    }

    /**
     * @return array<string>
     */
    public function userIds(): array
    {
        return $this->userIds;
    }
}
