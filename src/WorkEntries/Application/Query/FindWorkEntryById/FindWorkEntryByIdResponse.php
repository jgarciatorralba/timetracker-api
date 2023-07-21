<?php

declare(strict_types=1);

namespace App\WorkEntries\Application\Query\FindWorkEntryById;

use App\Shared\Domain\Bus\Query\Response;

final class FindWorkEntryByIdResponse implements Response
{
    public function __construct(
        private readonly array $data
    ) {
    }

    public function data(): array
    {
        return $this->data;
    }
}
