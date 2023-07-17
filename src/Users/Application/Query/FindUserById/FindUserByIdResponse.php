<?php

declare(strict_types=1);

namespace App\Users\Application\Query\FindUserById;

use App\Shared\Domain\Bus\Query\Response;

final class FindUserByIdResponse implements Response
{
    public function __construct(
        private readonly array $data
    ) {}

    public function data(): array
    {
        return $this->data;
    }
}
