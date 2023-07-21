<?php

declare(strict_types=1);

namespace App\Users\Application\Query\FindUsers;

use App\Shared\Domain\Bus\Query\Response;

final class FindUsersResponse implements Response
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
