<?php

declare(strict_types=1);

namespace App\Users\Application\Command\UpdateUser;

use App\Shared\Domain\Bus\Command\Command;

final class UpdateUserCommand implements Command
{
    public function __construct(
        private readonly string $id,
        private readonly ?string $name,
        private readonly ?string $email
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): ?string
    {
        return $this->name;
    }

    public function email(): ?string
    {
        return $this->email;
    }
}
