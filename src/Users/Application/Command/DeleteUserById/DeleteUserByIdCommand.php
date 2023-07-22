<?php

declare(strict_types=1);

namespace App\Users\Application\Command\DeleteUserById;

use App\Shared\Domain\Bus\Command\Command;

final class DeleteUserByIdCommand implements Command
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
