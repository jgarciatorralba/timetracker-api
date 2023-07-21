<?php

declare(strict_types=1);

namespace App\Users\Application\Query\FindUserById;

use App\Shared\Domain\Bus\Query\Query;

final class FindUserByIdQuery implements Query
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
