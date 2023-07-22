<?php

declare(strict_types=1);

namespace App\WorkEntries\Application\Command\DeleteWorkEntryById;

use App\Shared\Domain\Bus\Command\Command;

final class DeleteWorkEntryByIdCommand implements Command
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
