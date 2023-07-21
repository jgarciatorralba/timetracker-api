<?php

declare(strict_types=1);

namespace App\WorkEntries\Application\Query\FindWorkEntryById;

use App\Shared\Domain\Bus\Query\Query;

final class FindWorkEntryByIdQuery implements Query
{
    public function __construct(
        private readonly string $id
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }
}
